<?php

namespace App\Repository\Shop\write;

use App\Models\Shop\ShopCategory;

interface ShopCategoryWriteRepositoryInterface
{
    public function save(ShopCategory $shopCategory): bool;
    public function insert(array $data): bool;

}
