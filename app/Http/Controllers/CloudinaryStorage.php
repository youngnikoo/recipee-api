<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CloudinaryStorage extends Controller
{
    private const folder_path = 'recipee';

    public static function path($path){
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function upload($image, $fileName){
        $newFileName = str_replace(' ', '_', $fileName);
        $publicId = date('Y-m-d_His').'_'.$newFileName;
        $result = cloudinary()->upload($image, [
            "public_id" => self::path($publicId),
            "folder"    => self::folder_path
        ])->getSecurePath();

        return $result;
    }

    public static function replace($path, $image, $publicId){
        self::delete($path);
        return self::upload($image, $publicId);
    }

    public static function delete($path){
        $publicId = self::folder_path.'/'.self::path($path);
        return cloudinary()->destroy($publicId);
    }
}
