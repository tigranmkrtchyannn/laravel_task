<?php

namespace App\Repository\Write\Basket;

use App\Models\BasketItem;
use Illuminate\Database\Eloquent\Builder;


class BasketWriteRepository implements BasketWriteRepositoryInterface
{
    private function query(): Builder
    {
        return BasketItem::query();
    }

    public function save(BasketItem $basketItem): bool
    {
        $basketItem->save();

        return true;
    }

    public function delete(int $userId, int $productId): bool
    {
        $this->query()->where('product_id', $productId)
            ->where('user_id', $userId)->delete();

        return true;
    }

    public function deleteForUSer(int $userId): bool
    {
        $this->query()->where('user_id', $userId)->delete();

        return true;
    }

    public function updateQuantity(BasketItem $basketItem): bool
    {
        $basketItem->save();

        return true;
    }
}
