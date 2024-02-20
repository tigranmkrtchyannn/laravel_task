<?php

namespace App\Servicis\ProductCategoryAction\Category;

use App\Repository\Write\Category\CategoryWriteRepository;

class CategoriesDeleteAction
{
    public function __construct(
        public CategoryWriteRepository $categoryWriteRepository
    )
    {}

    public function run(int $id): bool
    {
        return $this->categoryWriteRepository->delete($id);
    }

}
