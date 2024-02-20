<?php

namespace App\Repository\Read\Basket;

use App\Exceptions\BasketNotFoundException;
use App\Models\BasketItem;
use Illuminate\Database\Eloquent\Builder;

class BasketReadRepository implements BasketReadRepositoryInterface
{
    private function query(): Builder
    {
        return BasketItem::query();
    }

    /**
     * @throws BasketNotFoundException
     */
    public function findBasketItem($userId, $productId): ?BasketItem
    {
        $basket = $this->query()
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();


        if (is_null($basket)) {

            throw new BasketNotFoundException();
        }

        return $basket;
    }

}
