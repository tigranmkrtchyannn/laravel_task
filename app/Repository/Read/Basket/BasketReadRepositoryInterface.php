<?php

namespace App\Repository\Read\Basket;

interface BasketReadRepositoryInterface
{
    public function findBasketItem(int $userId, int $productId);
}
