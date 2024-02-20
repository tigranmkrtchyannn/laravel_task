<?php

namespace App\Repository\Write\Category;

use App\Models\Category;

class CategoryWriteRepository implements CategoryWriteInterface
{
    public function save(Category $category): bool
    {
        $category->save();

        return true;
    }

    public function delete(int $id): bool
    {
        $done = Category::query()->where('id', $id)->delete();

        return $done ? true : false;
    }

    public function update(Category $category): bool
    {
        $category->save();

        return true;
    }
}
