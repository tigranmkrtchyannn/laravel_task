<?php

namespace App\Servicis\ImageAction;

use App\DTO\ImageDto;
use Illuminate\Support\Facades\Storage;
use Nyholm\Psr7\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class ImageAction extends  DataTransferObject
{
    public  function run(ImageDto $imageDto)
    {
        $uploadedImage = $imageDto->file;
        $path = Storage::disk('public')->putFile('images', $uploadedImage);

        return $path;
    }

}
