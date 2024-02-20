<?php

namespace App\Servicis\BasketAction;

use App\Repository\Write\Basket\BasketWriteRepositoryInterface;

class BasketDeleteForUserAction
{
    public function __construct(
        public BasketWriteRepositoryInterface $basketWriteRepository
    ){}

    public function run(int $userId)
    {
        return $this->basketWriteRepository->deleteForUSer($userId);
    }
}
