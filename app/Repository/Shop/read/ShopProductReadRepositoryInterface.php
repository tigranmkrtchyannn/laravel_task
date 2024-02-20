<?php

namespace App\Repository\Shop\read;

use Illuminate\Database\Eloquent\Collection;

interface ShopProductReadRepositoryInterface
{
    public function getAll(): Collection;
}
