<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
//use File;

function saveImage($destination, $attribute , $width=null, $height=null): string
{
    if (!File::isDirectory(base_path().'/public/uploads/'.$destination)){
        File::makeDirectory(base_path().'/public/uploads/'.$destination, 0777, true, true);
    }

    if ($attribute->extension() == 'svg'){
        $file_name = time() . '-' . $attribute->getClientOriginalName();
        $path = 'uploads/'. $destination .'/' .$file_name;
        $attribute->move(public_path('uploads/' . $destination .'/'), $file_name);
        return $path;
    }

    $img = Image::make($attribute);
    if ($width != null && $height != null && is_int($width) && is_int($height)) {
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
    }

    $returnPath = 'uploads/'. $destination .'/' . time().'-'. Str::random(10) . '.' . $attribute->extension();
    $savePath = base_path().'/public/'.$returnPath;
    $img->save($savePath);
    return $returnPath;
}

function deleteFile($path)
{
    File::delete($path);
}

function getFile($file)
{
    return asset($file);
}


function getOption($option_key)
{
    $system_settings = config('settings');

    if ($option_key && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } else {
        return '';
    }
}
