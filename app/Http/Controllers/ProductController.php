<?php

namespace App\Http\Controllers;

use App\DTO\ProductDto;
use App\Http\Requests\ProductMaxPrice;
use App\Http\Requests\ProductRequest;
use App\Repository\Read\Product\ProductReadRepository;
use App\Repository\Write\Product\ProductWriteRepository;
use App\Servicis\ProductCategoryAction\Product\DeleteProductAtNight;
use App\Servicis\ProductCategoryAction\Product\ProductAllAction;
use App\Servicis\ProductCategoryAction\Product\ProductCreateAction;
use App\Servicis\ProductCategoryAction\Product\ProductDeleteAction;
use App\Servicis\ProductCategoryAction\Product\ProductUpdateAction;
use App\Servicis\ProductCategoryAction\Product\ShowProductAction;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller
{
    public function __construct(
        public ProductCreateAction $createAction,
        public ProductReadRepository $productReadRepository,
        public ProductWriteRepository $productWriteRepository,
        public ProductAllAction $allAction,
        public ProductDeleteAction $deleteAction,
        public ProductUpdateAction $updateAction,
        public ShowProductAction $showAction,
    ){}

    public function  index(): JsonResponse
    {
        $products = $this->allAction->run();
        return response()->json(['products' => $products]);
    }

    public function  create(ProductRequest $request): JsonResponse
    {
        $dto = ProductDto::fromRequest($request);
        $this->createAction->run($dto);

        return response()->json(['message' =>"product add success"], 201);
    }

    public function delete(int $id): bool
    {
        $this->deleteAction->run($id);

        return true;
    }

    public function update(ProductRequest $request): JsonResponse
    {
        $dto = ProductDto::fromRequest($request);
        $this->updateAction->run($dto);

        return response()->json('Product updated');
    }

    public function  show(int $id): JsonResponse
    {
        $product = $this->showAction->run($id);

        return response()->json(['product' => $product]);
    }


}
