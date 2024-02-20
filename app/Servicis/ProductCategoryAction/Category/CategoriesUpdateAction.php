<?php

namespace App\Servicis\ProductCategoryAction\Category;

use App\DTO\CategoriesDto;
use App\Repository\Read\Category\CategoryReadInterface;
use App\Repository\Write\Category\CategoryWriteInterface;

class CategoriesUpdateAction
{
    public function __construct(
        public CategoryWriteInterface $categoryWrite,
        public CategoryReadInterface $categoryRead
    ){}


    /**
     * @param CategoriesDto $categoriesDto
     * @return JsonResponse|bool
     */
    public function run(CategoriesDto $categoriesDto): JsonResponse | bool
    {
        try {
            $category =  $this->categoryRead->getById($categoriesDto->id);

            $category->updateCategory($categoriesDto);

            return $this->categoryWrite->update($category);

        } catch (ModelNotFoundException $e) {

            return response()->json(['error' => 'Category not found'], 404);

        }
    }

}
