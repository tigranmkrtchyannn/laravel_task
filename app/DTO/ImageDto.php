<?php

namespace App\DTO;

use App\Http\Requests\ImagePathRequest;
use Spatie\DataTransferObject\DataTransferObject;

class ImageDto extends  DataTransferObject
{
 public $file;

 public static function fromImageRequest(ImagePathRequest $imagePathRequest): self
 {
     return new self(
         file: $imagePathRequest->getFile()
     );
 }
}
