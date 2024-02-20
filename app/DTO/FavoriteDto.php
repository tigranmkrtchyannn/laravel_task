<?php

namespace App\DTO;

use App\Http\Requests\FavoriteRequest;
use Spatie\DataTransferObject\DataTransferObject;

class FavoriteDto extends DataTransferObject
{
    public  int $productId;
    public  int $userId;

    public static function fromRequest(FavoriteRequest $request): self
    {
        return new self(
            productId: $request->getProductId(),
            userId: $request->getUserId()
        );
    }
}
