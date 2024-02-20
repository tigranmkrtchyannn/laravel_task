<?php

namespace App\Servicis\ProductCategoryAction\Category;

use App\Repository\Read\Category\CategoryReadInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoriesAllAction
{
    public function __construct(
        public CategoryReadInterface $categoryRead
    )
    {}

    public function run(): Collection
    {
        return $this->categoryRead->getAll();
    }
}
