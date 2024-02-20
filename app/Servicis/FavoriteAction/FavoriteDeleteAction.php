<?php

namespace App\Servicis\FavoriteAction;

use App\Repository\Write\Favorite\FavoriteWriteRepositoryInterface;

class FavoriteDeleteAction
{
    public function __construct(
       public  FavoriteWriteRepositoryInterface $favoriteWriteRepository
    ){}

    public  function run(int $userId, int $productId): bool
    {
       return $this->favoriteWriteRepository->delete($userId, $productId);
    }
}
