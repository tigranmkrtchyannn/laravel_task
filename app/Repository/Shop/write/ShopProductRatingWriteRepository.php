<?php

namespace App\Repository\Shop\write;

use App\Models\Shop\ProductRating;
use Illuminate\Database\Eloquent\Builder;

class ShopProductRatingWriteRepository implements  ShopProductRatingWriteRepositoryInterface
{
    private function query(): Builder
    {
        return ProductRating::query();
    }

    public function insert(array $data): bool
    {
        return $this->query()
            ->upsert(
            $data,
            'product_id',
        );
    }
}
