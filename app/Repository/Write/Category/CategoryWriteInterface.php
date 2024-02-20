<?php

namespace App\Repository\Write\Category;

use App\DTO\CategoriesDto;
use App\Models\Category;

interface CategoryWriteInterface
{
    public function save(Category $category): bool;

    public function delete(int $id): bool;

    public function update(Category $category): bool;
}
