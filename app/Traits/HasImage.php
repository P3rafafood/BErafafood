<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public function uploadImage($image_file, $path)
    {
        $image_file->storeAs('public/img/'.$path, $image_file->hashName());
    }

    public function removeImage($image_name, $path)
    {
        Storage::disk('local')->delete('public/img/'.$path.'/'.basename($image_name));
    }
}

