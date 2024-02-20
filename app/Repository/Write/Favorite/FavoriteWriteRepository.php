<?php

namespace App\Repository\Write\Favorite;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Builder;

class FavoriteWriteRepository implements FavoriteWriteRepositoryInterface
{
    protected function query(): Builder
    {
        return Favorite::query();
    }

    public function save(Favorite $favorite): bool
    {
        $favorite->save();

        return true;
    }

    public function delete(int $userId, int $productId): bool
    {
        $this->query()->where('user_id', $userId)
            ->where('product_id', $productId)
            ->delete();

        return true;
    }
}
