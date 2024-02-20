<?php

namespace App\Repository\Shop\read;

use App\Models\Shop\ShopCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ShopCategoryReadRepository implements  ShopCategoryReadRepositoryInterface
{
    private function query(): Builder
    {
        return ShopCategory::query();
    }
    public function getAll(): Collection
    {
     return ShopCategory::all();
    }
    public function findByName(string $name): ShopCategory
    {
        return $this->query()
            ->where('name',$name);
    }
}
