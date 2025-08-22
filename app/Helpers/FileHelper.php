<?php
namespace App\Helpers;

use App\Models\MediaFile;
use App\Models\MediaFileVariant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Log;
class FileHelper
{




    public static function uploadFile($file,$folder_path, $file_for, $model_type, $model_id,$type,$name, $params = [])
    {
        $s_file = $file;
        $s_folder_path =  $folder_path;
        $s_name = $name;
        $s_type = $type;
        $s_model_type= $model_type;
        $s_model_id = $model_id;
        $s_file_for = $file_for;
        $s_file_size = $s_file->getSize();
        $s_extension = $s_file->getClientOriginalExtension();
        $s_file_name = ($s_name !=null ? Str::slug($s_name) : Str::slug($file_for))."_" . Str::random(6) . ".{$s_extension}";
        $s_folder_path_original = $folder_path."original/";

        // Store Original Image
        if (!file_exists(public_path($s_folder_path_original))) {
            mkdir(public_path($s_folder_path_original), 0777, true);
        }
        $s_file->move(public_path($s_folder_path_original), $s_file_name);


        // Save Original File Info in Database
        $media = MediaFile::create([

            'name' => $s_name,
            'file' => "{$s_folder_path_original}{$s_file_name}",
            'type' => $s_type,
            'model_type' => $model_type,
            'model_id' => $s_model_id,
            'file_for' => $s_file_for,
            'size' => $s_file_size,
            'extension' => $s_extension,

        ]);
        // Log::info(" model type:{$model_type} file for: {$file_for}: ");
        // Generate Multiple Sizes based on config
        $originalFilePath = public_path($s_folder_path_original . $s_file_name);
        self::generateImageSizes($originalFilePath, $s_file_name, $media->id, $s_file_for,$s_folder_path, $s_model_type);

        return $media;
    }

    public static function generateImageSizes($filePath, $originalFileName, $mediaFileId, $fileFor, $folder_path, $model_type = null)
{
    $sizeConfig = config("filesizes.{$model_type}.{$fileFor}");
    // Log::info("File size config model type:{$model_type} file for: {$fileFor}: ", $sizeConfig);

    if (!$sizeConfig) {
        return;
    }
    foreach ($sizeConfig as $type => $size) {
        [$width, $height] = explode('x', $size);
        $folderPath = $folder_path . "{$size}/";

        // Ensure Directory Exists
        if (!file_exists(public_path($folderPath))) {
            mkdir(public_path($folderPath), 0777, true);
        }

        if (!file_exists($filePath)) {
            // Log::error("File not found at: " . $filePath);
            return response()->json(['error' => 'File not found'], 400);
        }

        // Resize Image
        $image = Image::read($filePath);
        $image->cover($width, $height, 'top');
        $image->resize($width, $height);
        $image->save($folderPath . $originalFileName);

        // Save in Database
        MediaFileVariant::create([
            'media_file_id' => $mediaFileId,
            'size' => "{$size}",
            'file' => "{$folderPath}{$originalFileName}",
        ]);
    }
}


    /**
     * Handle file upload or insert without file
     *
     * @param object|null $file File from request (nullable)
     * @param string $fileFor Purpose: 'thumbnail', 'gallery', 'slider', 'general'
     * @param int|null $modelType Model type (e.g., 1=Destination, 2=Country)
     * @param int|null $modelId Model row ID
     * @param array $extraParams Additional parameters like name, type, size
     * @return MediaFile|null
     */


     /**
     * Delete a file from storage and database
     *
     * @param int $fileId File ID
     * @return bool
     */
    public static function deleteFile($fileId)
    {
        $media = MediaFile::find($fileId);

        if (!$media) {
            return false; // File not found
        }

        // Delete the physical file if it's stored locally
        if ($media->file && file_exists(public_path($media->file))) {
            unlink(public_path($media->file));
        }

        // Delete the variants
        if($media->variants){
            self::deleteVariants($media->id);
        }

        // Delete the database record
        return $media->delete();
    }



    public static function updateFile($fileId,$file,$extra=[])
    {
        $mediaFile = MediaFile::find($fileId);

        if ($mediaFile) {

            $folderPath = dirname($mediaFile->file);
            $folderPath = str_replace("original", "", $folderPath);
            $name = $mediaFile->name;
            $fileFor = $mediaFile->file_for;
            $modelType = $mediaFile->model_type;

            $orignalfolderPath = $folderPath."/";

            // Delete the old file from storage
            if (file_exists(public_path($mediaFile->file))) {
                unlink(public_path($mediaFile->file));
            }

            // Delete the variants
            if($mediaFile->variants){
                self::deleteVariants($mediaFile->id);
            }

            $s_file_size = $file->getSize();
            $s_extension = $file->getClientOriginalExtension();
            $s_file_name = ($name !=null ? Str::slug($name) : Str::slug($fileFor))."_" . Str::random(6) . ".{$s_extension}";
            $s_folder_path_original = $orignalfolderPath;
            $s_folder_path = $folderPath;

            // Store Original Image
            $filePath = $s_folder_path_original . $s_file_name;

            $file->move(public_path($s_folder_path_original), $s_file_name);
            // Update file path in the media file record
            $mediaFile->size = $s_file_size;
            $mediaFile->extension = $s_extension;
            $mediaFile->file = $filePath;
            $mediaFile->save();

            // Update media file variants
            self::generateImageSizes($filePath, $s_file_name, $mediaFile->id, $fileFor, $s_folder_path, $modelType);

            return $mediaFile;
        }

        return false;
    }

    public static function deleteVariants($fileId){

        Log::info("Deleting variants for file: " . $fileId);
        $files = MediaFileVariant::where('media_file_id', $fileId)->get();
        Log::info("Variants found: " . $files);
        // Delete the variants
        if($files){
            foreach ($files as $variant) {
                if ($variant->file && file_exists(public_path($variant->file))) {
                    unlink(public_path($variant->file));
                }
                $variant->delete();
            }
        }


    }
}
