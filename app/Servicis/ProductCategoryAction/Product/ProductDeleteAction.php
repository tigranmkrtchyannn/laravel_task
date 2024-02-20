<?php

namespace App\Servicis\ProductCategoryAction\Product;

use App\Repository\Write\Product\ProductWriteRepositoryInterface;

class ProductDeleteAction
{

    public function __construct(
        public ProductWriteRepositoryInterface $productWriteRepository,
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->productWriteRepository->delete($id);
    }

}
