<?php

namespace App\Servicis\BasketAction;

use App\DTO\BasketDto;
use App\Repository\Read\Basket\BasketReadRepositoryInterface;
use App\Repository\Write\Basket\BasketWriteRepositoryInterface;
use Illuminate\Http\JsonResponse;


class BasketUpdateAction
{
    public function __construct(
        public BasketReadRepositoryInterface $basketReadRepository,
        public BasketWriteRepositoryInterface $basketWriteRepository
    ){}

    /**
     * @param BasketDto $basketDto
     * @return JsonResponse
     */

    public function run(BasketDto $basketDto): void
    {
        $basketItem = $this->basketReadRepository->findBasketItem(
            $basketDto->user,
            $basketDto->productId
        );

        $basketItem->updateItemQuantity($basketDto);

        $this->basketWriteRepository->updateQuantity($basketItem);
    }
}
