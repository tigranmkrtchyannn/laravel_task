<?php

namespace App\Http\Controllers;

use App\DTO\ImageDto;
use App\Http\Requests\ImagePathRequest;
use App\Servicis\ImageAction\ImageAction;


class ImageController extends Controller
{
    public function __construct(
       public  ImageAction $imageAction
    )
    {}
    public function  imagePathGeneration(ImagePathRequest $imagePathRequest): string
    {
        $dto = ImageDto::fromImageRequest($imagePathRequest);
        $path=$this->imageAction->run($dto);
        return response()->json($path);
    }
}
