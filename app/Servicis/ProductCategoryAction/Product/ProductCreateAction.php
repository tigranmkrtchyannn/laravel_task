<?php

namespace App\Servicis\ProductCategoryAction\Product;

use App\DTO\ProductDto;
use App\Jobs\CreateProduct;
class ProductCreateAction
{
    public function run(ProductDto $data): void
    {
       CreateProduct::dispatch($data);
    }
}
