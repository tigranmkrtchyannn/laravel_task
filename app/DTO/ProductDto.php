<?php

namespace App\DTO;

use App\Http\Requests\ProductRequest;
use Spatie\DataTransferObject\DataTransferObject;

class ProductDto extends DataTransferObject
{
    public string $name;
    public int $category_id;

    public int $count;
    public float $price;
    public  string $image_path;

   public ?int $id;

    public static function fromRequest(ProductRequest $request): self
    {
        return new self(
            name: $request->getProductName(),
            category_id: $request->getCategoryId(),
            price: $request->getProductPrice(),
            count: $request->getCount(),
            image_path: $request->getImagePath(),
            id:$request->getId(),

        );
    }
}
