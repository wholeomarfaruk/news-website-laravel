<?php

// Templates for the "download post as image" feature
// (App\Services\PostImageGenerator).
//
// Each top-level key is a template name. `default` is used when no
// template is requested. Every value below is read by
// PostImageGenerator::generate() — change spacing/colors/fonts/branding
// here without touching the drawing code.
//
// To add a new template:
//   1. Copy the `default` array to a new key, e.g. 'square'.
//   2. Adjust its values (or add a `layout` key and branch on it in
//      PostImageGenerator if the new template needs a different draw
//      routine, e.g. single-column instead of two-column).
//   3. Pass ['template' => 'square'] to PostImageGenerator::generate().

return [

    'default' => [
        // Which draw routine to use. PostImageGenerator dispatches on this,
        // so a structurally different template (e.g. single column, square
        // social card) can register its own layout key + render method.
        'layout' => 'two_column',

        'canvas' => [
            'width' => 1080,
            'margin' => 40,
            'background' => '#ffffff',
        ],

        'fonts' => [
            'regular' => 'fonts/NotoSansBengali-Regular.ttf',
            'bold' => 'fonts/NotoSansBengali-Bold.ttf',
        ],

        'colors' => [
            'accent' => '#c81e1e',
            'gray' => '#6b7280',
            'light_gray' => '#e5e7eb',
            'black' => '#1a1a1a',
            'white' => '#ffffff',
        ],

        'branding' => [
            'site_name' => 'The Message Today',
            'tagline' => 'তারুণ্যের চোখে আমরা...',
            'copyright' => '© 2025 All Rights Reserved | TheMessage2Day.com',
            'logo' => 'website/img/logo/logo-transparent.png',
        ],

        'masthead' => [
            'height' => 130,
            'logo_target_height' => 90,
            'site_name_font_size' => 30,
            'tagline_font_size' => 15,
        ],

        'date_strip' => [
            'height' => 45,
            'gap_after' => 20,
            'font_size' => 15,
        ],

        'headline' => [
            'font_size' => 34,
            'line_height' => 44,
            'max_lines' => 3,
            'gap_after' => 20,
        ],

        'body' => [
            'font_size' => 17,
            'line_height' => 27,
            'paragraph_gap' => 12,
            'column_gap' => 30,
            'inset_image_height' => 220,
            'gap_after_inset_image' => 14,
        ],

        'footer' => [
            'height' => 130,
            'credit_font_size' => 17,
            'copyright_font_size' => 13,
            'url_font_size' => 12,
        ],
    ],

];
