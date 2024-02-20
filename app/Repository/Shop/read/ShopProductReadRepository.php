<?php

namespace App\Repository\Shop\read;

use App\Models\Shop\ShopProduct;
use Illuminate\Database\Eloquent\Collection;

class ShopProductReadRepository  implements  ShopProductReadRepositoryInterface
{

    public function getAll(): Collection
    {
        return ShopProduct::all();
    }
}
