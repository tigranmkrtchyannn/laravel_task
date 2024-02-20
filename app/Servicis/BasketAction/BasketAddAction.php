<?php

namespace App\Servicis\BasketAction;

use App\DTO\BasketDto;
use App\Exceptions\BasketNotFoundException;
use App\Models\BasketItem;
use App\Repository\Read\Basket\BasketReadRepositoryInterface;
use App\Repository\Write\Basket\BasketWriteRepositoryInterface;

class BasketAddAction
{
    public function __construct(
        public BasketReadRepositoryInterface  $readRepository,
        public BasketWriteRepositoryInterface $basketWriteRepository
    ){}

    public function run(BasketDto $basketDto): bool
    {
        try {
            $basketItem = $this->readRepository->findBasketItem($basketDto->user, $basketDto->productId);

            return false;
        } catch (BasketNotFoundException $e) {

            $basket = BasketItem::create($basketDto);

            return $this->basketWriteRepository->save($basket);
        }
    }
}
