<?php

namespace App\Repository\Read\Product;

use App\Models\Product;

interface ProductReadInterface
{
    public function getAll();

    public function getById(int $productId): ?Product;

}
