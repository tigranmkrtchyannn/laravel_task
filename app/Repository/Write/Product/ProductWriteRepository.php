<?php

namespace App\Repository\Write\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductWriteRepository implements ProductWriteRepositoryInterface
{

    protected function query(): Builder
    {
        return Product::query();
    }

    public function delete(int $id): bool
    {
        Product::query()->where('id', $id)->delete();

        return true;
    }

    public function save(Product $product): bool
    {
        $product->save();

        return true;
    }

    public function updateProduct(Product $product): bool
    {
        $product->save();

        return true;
    }
    public function deleteBasedOnPrice(float $maxPrice): bool
    {
         $this->query()->where('price','<',$maxPrice)->delete();

        return true;

    }
}

