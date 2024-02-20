<?php

namespace App\Servicis\ProductCategoryAction\Category;
use App\Models\Category;
use App\Repository\Read\Category\CategoryReadInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class CategoriesShowAction
{
    public function __construct(
       public CategoryReadInterface $categoryReadRepository
    )
    {}

    public function run(int $id): JsonResponse| Category
    {
        try{
            $category = $this->categoryReadRepository->getById($id);

            return $category;
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
