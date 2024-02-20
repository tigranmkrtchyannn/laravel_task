<?php

namespace App\Repository\Shop\write;

use App\Models\Shop\ShopCategory;
use Illuminate\Database\Eloquent\Builder;

class ShopCategoryWriteRepository implements  ShopCategoryWriteRepositoryInterface
{
    private function query(): Builder
    {
        return ShopCategory::query();
    }

    public function save(ShopCategory $shopCategory): bool
    {
        $shopCategory->save();
        return true;
    }



    public function insert(array $data): bool
    {
       return $this->query()->upsert($data, ['name'],['name']);
    }
}
