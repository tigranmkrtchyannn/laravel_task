<?php

namespace App\Servicis\ProductCategoryAction\Category;

use App\DTO\CategoriesDto;
use App\Models\Category;
use App\Repository\Write\Category\CategoryWriteInterface;

class CategoriesCreateAction
{
    public function __construct(
        public CategoryWriteInterface $categoryWrite
    )
    {}
    public function run(CategoriesDto $data)
    {
        $category = Category::create($data);
        $this->categoryWrite->save($category);
        return $category;
    }

}
