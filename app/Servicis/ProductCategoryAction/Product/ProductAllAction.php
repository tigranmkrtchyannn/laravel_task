<?php

namespace App\Servicis\ProductCategoryAction\Product;

use App\Repository\Read\Product\ProductReadRepository;

class ProductAllAction
{
    public function __construct(
        public ProductReadRepository $productReadRepository
    )
    {}

    public function run(): iterable
    {
        return $this->productReadRepository->getAll();
    }

}
