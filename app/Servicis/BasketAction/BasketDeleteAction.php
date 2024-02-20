<?php

namespace App\Servicis\BasketAction;

use App\Repository\Write\Basket\BasketWriteRepositoryInterface;

class BasketDeleteAction
{
    public function __construct(
       public  BasketWriteRepositoryInterface $basketWriteRepository
    ){}

    public function run(int $userId,int $productId): bool
    {
        return $this->basketWriteRepository->delete($userId,$productId);
    }
}

