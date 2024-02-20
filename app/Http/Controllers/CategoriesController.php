<?php

namespace App\Http\Controllers;

use App\DTO\CategoriesDto;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CategoriesRequest;
use App\Servicis\ProductCategoryAction\Category\CategoriesAllAction;
use App\Servicis\ProductCategoryAction\Category\CategoriesCreateAction;
use App\Servicis\ProductCategoryAction\Category\CategoriesDeleteAction;
use App\Servicis\ProductCategoryAction\Category\CategoriesShowAction;
use App\Servicis\ProductCategoryAction\Category\CategoriesUpdateAction;
use Illuminate\Database\Eloquent\Collection;


class CategoriesController extends Controller
{
    public function __construct(
        public CategoriesAllAction $allAction,
        public CategoriesShowAction $showAction,
        public CategoriesDeleteAction $deleteAction,
        public CategoriesCreateAction $createAction,
        public CategoriesUpdateAction $updateAction
    )
    {}

    public function  create(CategoriesRequest $request): JsonResponse
    {
        $dto = CategoriesDto::fromRequest($request);
        $category = $this->createAction->run($dto);
        return response()->json(['category' => $category], 201);
    }
    public function index(): Collection
    {
        return $this->allAction->run();
    }
    public function show(int $id): JsonResponse
    {
        $category = $this->showAction->run($id);
        return response()->json(['message' => $category],);
    }

    public function delete(int $id): JsonResponse
    {
        $this->deleteAction->run($id);
        return response()->json(['message' => 'Category deleted successfully']);
    }

    public function update(CategoriesRequest $request)
    {
        $dto = CategoriesDto::fromRequest($request);
        $this->updateAction->run($dto);

        return response()->json('Category update succsesfuly');
    }
}
