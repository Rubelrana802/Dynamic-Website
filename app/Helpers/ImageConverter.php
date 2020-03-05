<?php

namespace App\Helpers;

use Image;

class ImageConverter
{
    public static function convert($image, $width, $height, $path)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path($path . $filename);
        // create new image with transparent background color
        $background = Image::canvas($width, $height);
        // read image file and resize it to 200x200
        $img = Image::make($image);
        // Image Height
        $img_height = $img->height();
        // Image Width
        $img_width = $img->width();
        $x = NULL;
        $y = NULL;
        if ($img_width > $img_height) {
            $y = $width;
        } else {
            $x = $height;
        }
        //Resize Image
        $img->resize($x, $y, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        // insert resized image centered into background
        $background->insert($img, 'bottom');
        // save
        $background->save($location);
        return $filename;
    }
}
