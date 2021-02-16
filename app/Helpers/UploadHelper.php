<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

trait UploadHelper
{
    // upload file
    public function uploadFile($file, $path, $prefix = null)
    {
        $file_url = '';
        $extension = $file->getClientOriginalExtension();
        if (isset($prefix))
        {
            $token = str_random(5);
            $extension = strtolower($extension);
            $file_name = $prefix.'_'.$token.'.'.$extension;
            $file_url = Storage::putFileAs($path, $file, $file_name);
        }
        else
        {
            $original_name = $file->getClientOriginalName();
            $name = pathinfo($original_name, PATHINFO_FILENAME);
            $extension = pathinfo($original_name, PATHINFO_EXTENSION);
            $token = str_random(2);
            $file_name = $name.'_'.$token.'.'.$extension;
            $file_url = Storage::putFileAs($path, $file, $file_name);
        }
        return $file_url;
    }

    public function uploadFileV2($file, $path, $prefix = null)
    {
        $file_url = '';
        $extension = $file->getClientOriginalExtension();
        $size = $file->getSize();
        if (isset($prefix))
        {
            $token = str_random(5);
            $extension = strtolower($extension);
            $file_name = $prefix.'_'.$token.'.'.$extension;
            $file_url = Storage::putFileAs($path, $file, $file_name);
        }
        else
        {
            $original_name = $file->getClientOriginalName();
            $name = pathinfo($original_name, PATHINFO_FILENAME);
            $extension = pathinfo($original_name, PATHINFO_EXTENSION);
            $token = str_random(2);
            $file_name = $name.'_'.$token.'.'.$extension;
            $file_url = Storage::putFileAs($path, $file, $file_name);
        }
        return [
            'name' => $file_name,
            'type' => $extension,
            'path' => $file_url,
            'size' => $size
        ];
    }

    // remove file
    public function removeFile($file)
    {
        $exists = Storage::disk('public')->exists($file);

        if ($exists)
        {
            Storage::disk('public')->delete($file);
        }
    }
}
