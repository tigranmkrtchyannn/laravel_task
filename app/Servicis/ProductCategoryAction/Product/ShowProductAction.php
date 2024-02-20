<?php

namespace App\Servicis\ProductCategoryAction\Product;

use App\Models\Product;
use App\Repository\Read\Product\ProductReadRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShowProductAction
{
    public function __construct(
        public ProductReadRepository $productReadRepository
    )
    {}

    public function run(int $id): JsonResponse | Product
    {
        try {
            $product = $this->productReadRepository->getById($id);

            return $product;

        } catch (ModelNotFoundException $e) {

            return response()->json(['error' => 'Product not found'], 404);
        }

    }
}
