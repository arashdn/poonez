<?php

namespace App;

use File;
use Config;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class Photo
{
    protected function createUniqueFilename( $filename, $extension )
    {
        $full_size_dir = \Config::get('global.post.image.path');

        $filename = substr(sha1(mt_rand()), 0, 20);
        while ( File::exists( $full_size_dir . $filename . '.' . $extension ) )
        {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken . '.' . $extension;
        }
        return $filename . '.' . $extension;
    }
    protected function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }

    public function uploadImage(Request $request)
    {

        $photo = $request->file('file_name');

        $originalName = $photo->getClientOriginalName();
        //$extension = $photo->getClientOriginalExtension();

        $extension = 'jpg';

        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);

        $filename = $this->sanitize($originalNameWithoutExt);

        $allowed_filename = $this->createUniqueFilename( $filename, $extension );
        
        $manager = new ImageManager();
        $img = $manager->make( $photo )
            //->resize(Config::get('global.post.image.size.w'),Config::get('global.post.image.size.h'))
            ->encode($extension,90)
            ->save(Config::get('global.post.image.path').DIRECTORY_SEPARATOR.$allowed_filename );

        $thumb = $manager->make( $photo )
            ->resize(Config::get('global.post.image.thumbnail_size.w'),Config::get('global.post.image.thumbnail_size.h'))
            ->encode('jpg',80)
            ->save(Config::get('global.post.image.thumbnail_path').DIRECTORY_SEPARATOR.$allowed_filename );

        try
        {
            if($img)
            {
                return $allowed_filename;
            }
            else
            {
                throw new \Exception('خطا در ذخیره عکس');
            }
        }
        catch (\Exception $e)
        {
            $message = 'خطای پایگاه داده رخ داد.';

            if(config('app.debug'))
                $message .= " \n". $e->getMessage();
        }


    }
}
