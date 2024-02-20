<?php

namespace App\Servicis\ProductCategoryAction\Product;

use App\DTO\ProductDto;
use App\Repository\Read\Product\ProductReadRepository;
use App\Repository\Write\Product\ProductWriteRepositoryInterface;
class ProductUpdateAction
{
    public function __construct(
        public ProductWriteRepositoryInterface $productWriteRepository,
        public ProductReadRepository $productReadRepository
    )
    {}

    public function run(ProductDto $productDto)
    {
      $product = $this->productReadRepository->getById($productDto->id);

      $product->updateProduct($productDto);

      return $this->productWriteRepository->updateProduct($product);

    }
}

