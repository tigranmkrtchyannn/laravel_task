<?php

namespace App\Servicis\FavoriteAction;

use App\DTO\FavoriteDto;
use App\Exceptions\FavoriteNotFoundException;
use App\Models\Favorite;
use App\Repository\Read\Favorite\FavoriteReadRepositoryInterface;
use App\Repository\Write\Favorite\FavoriteWriteRepositoryInterface;

class FavoriteAddAction
{
    public function __construct(
        public FavoriteWriteRepositoryInterface $favoriteWriteRepository,
        public FavoriteReadRepositoryInterface  $favoriteReadRepository,
    ){}

    public function run(FavoriteDto $dto): bool
    {
        try {
            $favoriteItem = $this->favoriteReadRepository->getFavorite($dto->productId);

            return false;

        } catch (FavoriteNotFoundException $exception) {

            $favorite = Favorite::create($dto);

            return $this->favoriteWriteRepository->save($favorite);

        }
    }
}
