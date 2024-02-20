<?php

namespace App\Repository\Write\Product;

use App\Models\Product;

interface ProductWriteRepositoryInterface
{
    public function updateProduct(Product $product);

    public function delete(int $id): bool;

    public function save(Product $product): bool;

    public function deleteBasedOnPrice(float $maxPrice): bool;
}
