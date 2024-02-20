<?php

namespace App\Repository\Write\Basket;

use App\Models\BasketItem;

interface BasketWriteRepositoryInterface
{
    public function save(BasketItem $basketItem);

    public function delete(int $userId, int $id);

    public function deleteForUSer(int $userId);

    public function updateQuantity(BasketItem $basketItem);

}
