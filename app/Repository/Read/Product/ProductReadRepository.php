<?php

namespace App\Repository\Read\Product;

use App\Exceptions\ProductNotFound;
use App\Models\Product;

class ProductReadRepository implements ProductReadInterface
{

    public function getAll(): iterable
    {
        return Product::query()->with('category')->get();
    }

    /**
     * @throws ProductNotFound
     */
    public function getById(int $productId): Product
    {
        $product = Product::query()
            ->where('id', $productId)
            ->first();

        if (is_null($product)) {

            throw new ProductNotFound();
        }

        return $product;

    }
}
