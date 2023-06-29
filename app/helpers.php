<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
if (!function_exists('get_name_image')) {
    function get_name_image(string $path): string {
        $arrName = explode("/", $path);
        return end($arrName);
    }
}

if (!function_exists('upload_image')) {
    function upload_image($pathImage,  File| UploadedFile $fileImage) :string {
        $inStoragePath = "public/users/";
        $oldPicture = get_name_image($pathImage);
        if ($oldPicture != null && Storage::exists($inStoragePath.$oldPicture)){
            Storage::delete($inStoragePath.$oldPicture);
        }
        $path = Storage::putFile($inStoragePath, $fileImage);
        return get_name_image($path);
    }
}
