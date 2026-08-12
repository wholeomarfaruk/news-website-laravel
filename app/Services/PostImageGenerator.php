<?php

namespace App\Services;

use App\Models\Post;
use Imagick;
use ImagickDraw;
use ImagickPixel;
use InvalidArgumentException;
use RuntimeException;
use Throwable;

class PostImageGenerator
{
    private array $config;
    private string $fontRegular;
    private string $fontBold;

    public function generate(Post $post, string $template = 'default'): string
    {
        $config = config("post_image_templates.{$template}");
        if ($config === null) {
            throw new InvalidArgumentException("Unknown post image template [{$template}].");
        }
        $this->config = $config;

        if (!class_exists(Imagick::class)) {
            throw new RuntimeException('Imagick extension is not installed.');
        }

        $this->fontRegular = public_path($this->config['fonts']['regular']);
        $this->fontBold = public_path($this->config['fonts']['bold']);
        if (!is_file($this->fontRegular) || !is_file($this->fontBold)) {
            throw new RuntimeException('Required font files are missing.');
        }

        return match ($this->config['layout']) {
            'two_column' => $this->renderTwoColumn($post),
            default => throw new InvalidArgumentException("Unknown layout [{$this->config['layout']}] in template."),
        };
    }

    private function renderTwoColumn(Post $post): string
    {
        $c = $this->config;
        $canvasWidth = $c['canvas']['width'];
        $margin = $c['canvas']['margin'];
        $contentWidth = $canvasWidth - ($margin * 2);
        $colors = $c['colors'];
        $branding = $c['branding'];

        // Throwaway 1x1 canvas used only for text-metric queries (pass 1).
        $probe = new Imagick();
        $probe->newImage(1, 1, new ImagickPixel('white'));

        $publishDate = $post->created_at?->locale('bn')->translatedFormat('d F Y, g:i A') ?? '';
        $categoryName = $post->category->name ?? '';
        $authorName = $post->author->title ?? null;
        $postUrl = $post->category
            ? route('post.show', ['category' => $post->category->slug, 'slug' => $post->slug])
            : '';

        $headlineFontSize = $c['headline']['font_size'];
        $headlineLines = $this->wrapText($probe, $post->title ?? '', $this->fontBold, $headlineFontSize, $contentWidth);
        if (count($headlineLines) > $c['headline']['max_lines']) {
            $headlineLines = array_slice($headlineLines, 0, $c['headline']['max_lines']);
            $lastIndex = count($headlineLines) - 1;
            $headlineLines[$lastIndex] = $this->truncateToWidth($probe, $headlineLines[$lastIndex] . '...', $this->fontBold, $headlineFontSize, $contentWidth);
        }

        $paragraphs = $this->extractPlainTextParagraphs($post->content ?? '');

        [$featuredImagePath, $hasFeaturedImage] = $this->resolveFeaturedImagePath($post);

        // --- Two-column newspaper body layout ---
        $columnGap = $c['body']['column_gap'];
        $columnWidth = (int) (($contentWidth - $columnGap) / 2);
        $insetImageHeight = $c['body']['inset_image_height'];
        $gapAfterInsetImage = $c['body']['gap_after_inset_image'];

        $bodyFontSize = $c['body']['font_size'];
        $bodyLineHeight = $c['body']['line_height'];
        $paragraphGap = $c['body']['paragraph_gap'];

        $bodyLines = [];
        foreach ($paragraphs as $paragraph) {
            $lines = $this->wrapText($probe, $paragraph, $this->fontRegular, $bodyFontSize, $columnWidth);
            foreach ($lines as $line) {
                $bodyLines[] = $line;
            }
            $bodyLines[] = null; // paragraph break marker
        }
        if (!empty($bodyLines) && end($bodyLines) === null) {
            array_pop($bodyLines);
        }

        $mastheadHeight = $c['masthead']['height'];
        $dateStripHeight = $c['date_strip']['height'];
        $gapAfterDateStrip = $c['date_strip']['gap_after'];
        $headlineLineHeight = $c['headline']['line_height'];
        $headlineBlockHeight = count($headlineLines) * $headlineLineHeight + 16;
        $gapAfterHeadline = $c['headline']['gap_after'];
        $footerHeight = $c['footer']['height'];

        $fixedHeight = $margin
            + $mastheadHeight
            + $dateStripHeight
            + $gapAfterDateStrip
            + $headlineBlockHeight
            + $gapAfterHeadline
            + $footerHeight
            + $margin;

        // No truncation: measure the FULL body content up front and split it
        // as evenly as possible across the two columns (column 1 first loses
        // its top slice to the inset image, if any), then let the canvas grow
        // to whatever height is actually needed to show all of it.
        $col1ImageReserve = $hasFeaturedImage ? ($insetImageHeight + $gapAfterInsetImage) : 0;

        $totalBodyHeight = $this->measureLinesHeight($bodyLines, $bodyLineHeight, $paragraphGap);
        $targetColumnHeight = (int) ceil(($totalBodyHeight + $col1ImageReserve) / 2);

        $col1Budget = max(0, $targetColumnHeight - $col1ImageReserve);

        [$col1Lines, $col2Lines] = $this->splitIntoTwoColumns($bodyLines, $col1Budget, $bodyLineHeight, $paragraphGap);

        $col1Height = $col1ImageReserve + $this->measureLinesHeight($col1Lines, $bodyLineHeight, $paragraphGap);
        $col2Height = $this->measureLinesHeight($col2Lines, $bodyLineHeight, $paragraphGap);
        $bodyBlockHeight = max($col1Height, $col2Height);

        $canvasHeight = (int) ($fixedHeight + $bodyBlockHeight);

        $probe->clear();

        $canvas = new Imagick();
        $canvas->newImage($canvasWidth, $canvasHeight, new ImagickPixel($colors['white']));
        $canvas->setImageFormat('png');

        $y = $margin;

        // --- Masthead ---
        $logoPath = public_path($branding['logo']);
        $logoTargetHeight = $c['masthead']['logo_target_height'];
        $logoDrawnWidth = $this->measureLogoWidth($logoPath, $logoTargetHeight);
        $logoX = $margin + (int) (($contentWidth - $logoDrawnWidth) / 2);
        $logoRightEdge = $logoX + $logoDrawnWidth;

        $taglineFontSize = $c['masthead']['tagline_font_size'];
        $taglineWidth = $this->textWidth($probe, $this->fontRegular, $taglineFontSize, $branding['tagline']);
        $this->drawText($canvas, $this->fontRegular, $taglineFontSize, $colors['gray'], $logoRightEdge - $taglineWidth, $y + 18, $branding['tagline']);

        if (is_file($logoPath)) {
            $this->drawLogo($canvas, $logoPath, $logoX, $y + 30, $logoTargetHeight);
        }

        $y += $mastheadHeight;
        $this->drawRect($canvas, $margin, $y, $canvasWidth - $margin, $y + 3, $colors['accent']);
        $y += 3;

        // --- Date / info strip (bordered box, not filled) ---
        $this->drawBorderedBox($canvas, $margin, $y, $canvasWidth - $margin, $y + $dateStripHeight, $colors['black']);
        $dateStripFontSize = $c['date_strip']['font_size'];
        $publishLabel = 'প্রকাশ: ' . $publishDate;
        $this->drawText($canvas, $this->fontBold, $dateStripFontSize, $colors['black'], $margin + 16, $y + 28, $publishLabel);
        if ($categoryName !== '') {
            $catWidth = $this->textWidth($probe, $this->fontBold, $dateStripFontSize, $categoryName);
            $this->drawText($canvas, $this->fontBold, $dateStripFontSize, $colors['accent'], $canvasWidth - $margin - 16 - $catWidth, $y + 28, $categoryName);
        }
        $y += $dateStripHeight + $gapAfterDateStrip;

        // --- Headline ---
        $headlineTop = $y;
        foreach ($headlineLines as $line) {
            $lineWidth = $this->textWidth($probe, $this->fontBold, $headlineFontSize, $line);
            $lineX = $margin + (int) (($contentWidth - $lineWidth) / 2);
            $this->drawText($canvas, $this->fontBold, $headlineFontSize, $colors['black'], $lineX, $y + 32, $line);
            $y += $headlineLineHeight;
        }
        $y = $headlineTop + $headlineBlockHeight + $gapAfterHeadline;

        $bodyTop = $y;
        $col1X = $margin;
        $col2X = $margin + $columnWidth + $columnGap;

        // --- Column 1: inset featured image (if any) then wrapped text ---
        $col1Y = $bodyTop;
        if ($hasFeaturedImage) {
            $this->drawCoverFitImage($canvas, $featuredImagePath, $col1X, $col1Y, $columnWidth, $insetImageHeight, $colors['white']);
            $col1Y += $insetImageHeight + $gapAfterInsetImage;
        }
        $this->drawColumnLines($canvas, $col1Lines, $col1X, $col1Y, $bodyFontSize, $bodyLineHeight, $paragraphGap, $colors['black']);

        // --- Column 2: wrapped text, plus a thin separating rule between columns ---
        $this->drawRect($canvas, $col2X - (int) ($columnGap / 2), $bodyTop, $col2X - (int) ($columnGap / 2) + 1, $bodyTop + $bodyBlockHeight, $colors['light_gray']);
        $this->drawColumnLines($canvas, $col2Lines, $col2X, $bodyTop, $bodyFontSize, $bodyLineHeight, $paragraphGap, $colors['black']);

        $y = $bodyTop + $bodyBlockHeight;

        // --- Footer (bordered box) ---
        $footerTop = $canvasHeight - $margin - $footerHeight;
        $this->drawBorderedBox($canvas, $margin, $footerTop, $canvasWidth - $margin, $footerTop + $footerHeight, $colors['black']);

        $fy = $footerTop + 32;
        $creditFontSize = $c['footer']['credit_font_size'];
        $creditLine = $branding['site_name'] . ($authorName ? '  |  প্রতিবেদক: ' . $authorName : '');
        $creditWidth = $this->textWidth($probe, $this->fontBold, $creditFontSize, $creditLine);
        $this->drawText($canvas, $this->fontBold, $creditFontSize, $colors['black'], $margin + (int) (($contentWidth - $creditWidth) / 2), $fy, $creditLine);
        $fy += 26;

        $this->drawRect($canvas, $margin + 30, $fy, $canvasWidth - $margin - 30, $fy + 1, $colors['light_gray']);
        $fy += 24;

        $copyrightFontSize = $c['footer']['copyright_font_size'];
        $copyrightWidth = $this->textWidth($probe, $this->fontRegular, $copyrightFontSize, $branding['copyright']);
        $this->drawText($canvas, $this->fontRegular, $copyrightFontSize, $colors['gray'], $margin + (int) (($contentWidth - $copyrightWidth) / 2), $fy, $branding['copyright']);
        $fy += 20;

        if ($postUrl !== '') {
            $urlFontSize = $c['footer']['url_font_size'];
            $urlWidth = $this->textWidth($probe, $this->fontRegular, $urlFontSize, $postUrl);
            $this->drawText($canvas, $this->fontRegular, $urlFontSize, $colors['gray'], $margin + (int) (($contentWidth - $urlWidth) / 2), $fy, $postUrl);
        }

        $probe->destroy();

        $binary = $canvas->getImageBlob();
        $canvas->clear();
        $canvas->destroy();

        if ($binary === '' || $binary === false) {
            throw new RuntimeException('Failed to encode generated image.');
        }

        return $binary;
    }

    /**
     * @return array{0: ?string, 1: bool}
     */
    private function resolveFeaturedImagePath(Post $post): array
    {
        $media = $post->resolveFeaturedMedia();

        if ($media && $media->path) {
            $path = public_path('uploads/' . $media->path);
            if (is_file($path)) {
                return [$path, true];
            }
        }

        $fallback = public_path('website/img/thumbnails/featured_img.jpg');
        if (is_file($fallback)) {
            return [$fallback, true];
        }

        return [null, false];
    }

    private function drawCoverFitImage(Imagick $canvas, string $path, int $destX, int $destY, int $destWidth, int $destHeight, string $backgroundColorHex): void
    {
        try {
            $source = new Imagick($path);
        } catch (Throwable) {
            return;
        }

        $srcWidth = $source->getImageWidth();
        $srcHeight = $source->getImageHeight();
        if ($srcWidth <= 0 || $srcHeight <= 0) {
            $source->destroy();
            return;
        }

        $source->setImageBackgroundColor(new ImagickPixel($backgroundColorHex));
        $source = $source->mergeImageLayers(Imagick::LAYERMETHOD_FLATTEN);

        $source->cropThumbnailImage($destWidth, $destHeight);

        $canvas->compositeImage($source, Imagick::COMPOSITE_OVER, $destX, $destY);
        $source->destroy();
    }

    private function measureLogoWidth(string $path, int $targetHeight): int
    {
        if (!is_file($path)) {
            return 0;
        }

        $info = @getimagesize($path);
        if ($info === false || $info[1] <= 0) {
            return 0;
        }

        return (int) round($info[0] * ($targetHeight / $info[1]));
    }

    private function drawLogo(Imagick $canvas, string $path, int $x, int $y, int $targetHeight): int
    {
        try {
            $source = new Imagick($path);
        } catch (Throwable) {
            return 0;
        }

        $srcWidth = $source->getImageWidth();
        $srcHeight = $source->getImageHeight();
        if ($srcWidth <= 0 || $srcHeight <= 0) {
            $source->destroy();
            return 0;
        }

        $targetWidth = (int) round($srcWidth * ($targetHeight / $srcHeight));
        $source->resizeImage($targetWidth, $targetHeight, Imagick::FILTER_LANCZOS, 1);

        $canvas->compositeImage($source, Imagick::COMPOSITE_OVER, $x, $y);
        $source->destroy();

        return $targetWidth;
    }

    private function makeDraw(string $fontPath, float $size, string $colorHex): ImagickDraw
    {
        $draw = new ImagickDraw();
        $draw->setFont($fontPath);
        $draw->setFontSize($size);
        $draw->setFillColor(new ImagickPixel($colorHex));
        $draw->setTextAntialias(true);

        return $draw;
    }

    private function drawText(Imagick $canvas, string $fontPath, float $size, string $colorHex, int $x, int $y, string $text): void
    {
        if ($text === '') {
            return;
        }

        $draw = $this->makeDraw($fontPath, $size, $colorHex);
        $canvas->annotateImage($draw, $x, $y, 0, $text);
    }

    private function textWidth(Imagick $probe, string $fontPath, float $size, string $text): int
    {
        if ($text === '') {
            return 0;
        }

        $draw = $this->makeDraw($fontPath, $size, $this->config['colors']['black']);
        $metrics = $probe->queryFontMetrics($draw, $text);

        return (int) ceil($metrics['textWidth']);
    }

    /**
     * @return array<int, string>
     */
    private function wrapText(Imagick $probe, string $text, string $fontPath, float $size, int $maxWidthPx): array
    {
        $text = trim($text);
        if ($text === '') {
            return [];
        }

        $words = preg_split('/\s+/u', $text);
        if ($words === false) {
            return [$text];
        }

        $lines = [];
        $currentLine = '';

        foreach ($words as $word) {
            $candidate = $currentLine === '' ? $word : $currentLine . ' ' . $word;
            $width = $this->textWidth($probe, $fontPath, $size, $candidate);

            if ($width <= $maxWidthPx || $currentLine === '') {
                $currentLine = $candidate;
                if ($width > $maxWidthPx && $currentLine === $word) {
                    // Single word already exceeds max width; keep as its own line.
                    $lines[] = $currentLine;
                    $currentLine = '';
                }
            } else {
                $lines[] = $currentLine;
                $currentLine = $word;
            }
        }

        if ($currentLine !== '') {
            $lines[] = $currentLine;
        }

        return $lines;
    }

    private function truncateToWidth(Imagick $probe, string $text, string $fontPath, float $size, int $maxWidthPx): string
    {
        while (mb_strlen($text) > 1) {
            if ($this->textWidth($probe, $fontPath, $size, $text) <= $maxWidthPx) {
                return $text;
            }
            $text = mb_substr($text, 0, -1);
        }

        return $text;
    }

    /**
     * @return array<int, string>
     */
    private function extractPlainTextParagraphs(string $html): array
    {
        if (trim($html) === '') {
            return [];
        }

        $normalized = preg_replace(
            ['/<br\s*\/?>/i', '/<\/(p|div|h[1-6]|li)>/i'],
            "\n",
            $html
        );

        $plain = strip_tags($normalized ?? $html);
        $plain = html_entity_decode($plain, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        $plain = preg_replace('/[ \t]+/u', ' ', $plain);
        $plain = preg_replace('/\n{2,}/u', "\n", $plain);
        $plain = trim($plain);

        if ($plain === '') {
            return [];
        }

        $lines = preg_split('/\n/u', $plain);
        $paragraphs = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line !== '') {
                $paragraphs[] = $line;
            }
        }

        return $paragraphs;
    }

    private function drawRect(Imagick $canvas, int $x1, int $y1, int $x2, int $y2, string $colorHex): void
    {
        $draw = new ImagickDraw();
        $draw->setFillColor(new ImagickPixel($colorHex));
        $draw->rectangle($x1, $y1, $x2, $y2);
        $canvas->drawImage($draw);
    }

    private function drawBorderedBox(Imagick $canvas, int $x1, int $y1, int $x2, int $y2, string $colorHex): void
    {
        $draw = new ImagickDraw();
        $draw->setFillColor(new ImagickPixel('transparent'));
        $draw->setStrokeColor(new ImagickPixel($colorHex));
        $draw->setStrokeWidth(1.5);
        $draw->rectangle($x1, $y1, $x2, $y2);
        $canvas->drawImage($draw);
    }

    /**
     * Distributes a flat line array (with null paragraph-break markers) across
     * two newspaper columns: column 1 fills first up to its budget, EVERY
     * remaining line (no cap, nothing dropped) flows into column 2. Returns
     * [col1Lines, col2Lines].
     *
     * @param array<int, string|null> $lines
     * @return array{0: array<int, string|null>, 1: array<int, string|null>}
     */
    private function splitIntoTwoColumns(array $lines, int $col1Budget, int $lineHeight, int $paragraphGap): array
    {
        $col1 = [];
        $col2 = [];
        $usedCol1 = 0;
        $inCol2 = false;

        foreach ($lines as $line) {
            $h = $line === null ? $paragraphGap : $lineHeight;

            if (!$inCol2) {
                if ($usedCol1 + $h <= $col1Budget) {
                    $col1[] = $line;
                    $usedCol1 += $h;
                    continue;
                }
                $inCol2 = true;
            }

            $col2[] = $line;
        }

        $col1 = $this->trimTrailingBreak($col1);
        $col2 = $this->trimTrailingBreak($col2);

        return [$col1, $col2];
    }

    /**
     * @param array<int, string|null> $lines
     * @return array<int, string|null>
     */
    private function trimTrailingBreak(array $lines): array
    {
        while (!empty($lines) && end($lines) === null) {
            array_pop($lines);
        }

        return $lines;
    }

    /**
     * @param array<int, string|null> $lines
     */
    private function measureLinesHeight(array $lines, int $lineHeight, int $paragraphGap): int
    {
        $height = 0;
        foreach ($lines as $line) {
            $height += $line === null ? $paragraphGap : $lineHeight;
        }

        return $height;
    }

    /**
     * @param array<int, string|null> $lines
     */
    private function drawColumnLines(Imagick $canvas, array $lines, int $x, int $y, float $fontSize, int $lineHeight, int $paragraphGap, string $colorHex): void
    {
        foreach ($lines as $line) {
            if ($line === null) {
                $y += $paragraphGap;
                continue;
            }
            $this->drawText($canvas, $this->fontRegular, $fontSize, $colorHex, $x, $y + (int) ($lineHeight * 0.7), $line);
            $y += $lineHeight;
        }
    }
}
