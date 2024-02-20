<?php

namespace App\Repository\Read\Favorite;

use App\Exceptions\FavoriteNotFoundException;
use App\Models\Favorite;

class FavoriteReadRepository implements FavoriteReadRepositoryInterface
{
    /**
     * @throws FavoriteNotFoundException
     */
    public function getFavorite(int $id)
    {
        $favorite = Favorite::query()->where('product_id', $id)->first();

        if (is_null($favorite)) {

            throw  new FavoriteNotFoundException();
        }
        return $favorite;
    }
}
