<?php

namespace App\DTO;

use App\Http\Requests\CategoriesRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CategoriesDto extends DataTransferObject
{
    public string $name;
    public ?int  $parent_id;
    public string $image_path;

    public ?int $id;

    public static  function  fromRequest(CategoriesRequest $categoriesRequest): self
    {
        return new self(
            name: $categoriesRequest->getCategoryName(),
            image_path: $categoriesRequest->getImagePath(),
            parent_id: $categoriesRequest->getParentId(),
            id:$categoriesRequest->getId()

        );
    }
}
