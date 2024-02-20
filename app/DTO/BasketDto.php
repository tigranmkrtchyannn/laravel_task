<?php

namespace App\DTO;

use App\Http\Requests\BasketRequest;
use Spatie\DataTransferObject\DataTransferObject;

class BasketDto extends DataTransferObject
{
    public int $productId;

    public int $user;
    public int $quantity;

    public static function fromRequest(BasketRequest $request): self
    {
        return new self(
            productId: $request->getProductId(),
            user: $request->getUserId(),
            quantity:$request->getQuantity()
        );
    }

}
