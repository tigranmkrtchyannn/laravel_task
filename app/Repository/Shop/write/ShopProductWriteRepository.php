<?php

namespace App\Repository\Shop\write;

use App\Models\Shop\ShopProduct;
use Illuminate\Database\Eloquent\Builder;

class ShopProductWriteRepository implements ShopProductWriteRepositoryInterface
{
    private function query(): Builder
    {
        return ShopProduct::query();
    }
    public function insert(array $data): bool
    {
       return  $this->query()
           ->upsert(
               $data,
               'product_id',
           );

    }
}
