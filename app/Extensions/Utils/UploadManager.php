<?php

namespace App\Extensions\Utils;


use App\Extensions\Traits\InitializesClass;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadManager
{
    use InitializesClass;

    public function saveFile(UploadedFile $file): string
    {
        $media_type = $file->getClientMimeType();

        $path = 'media/'.$media_type;

        $storage_path = $file->storePublicly($path);

        $storage_path_array = explode('/', $storage_path);

        $filename = $storage_path_array[count($storage_path_array) - 1];

        return '/storage/'.$path.'/'.$filename;
    }

    public function saveFileAs(UploadedFile $file, $saveAs): string
    {
        $media_type = $file->getClientMimeType();

        $path = '/media/'.$media_type;

        $file->storePubliclyAs($path, $saveAs);

        return '/storage/'.$path.'/'.$saveAs;
    }

    public function deleteFile($location)
    {
        Storage::disk('public')->delete($location);
    }
}
