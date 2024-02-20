<?php

namespace App\Repository\Shop\read;

use App\Models\Shop\ShopCategory;
use Illuminate\Database\Eloquent\Collection;

interface ShopCategoryReadRepositoryInterface
{
    public function getAll(): Collection;

}
