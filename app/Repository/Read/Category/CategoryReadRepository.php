<?php

namespace App\Repository\Read\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryReadRepository implements CategoryReadInterface
{
    public function getAll(): Collection
    {
        return Category::query()->get();

    }

    public function getById(int $id): Category
    {
        $category = Category::query()
            ->where('id', $id)
            ->first();

        if (!$category) {
            throw new ModelNotFoundException("Category with ID {$id} not found");
        }

        return $category;
    }
}
