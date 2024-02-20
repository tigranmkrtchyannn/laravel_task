<?php

namespace App\Repository\Write\Favorite;

use App\Models\Favorite;

interface FavoriteWriteRepositoryInterface
{
    public function save(Favorite $favorite);

    public function delete(int $userId, int $productId);

}
