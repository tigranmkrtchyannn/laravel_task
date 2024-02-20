<?php

namespace App\Repository\Read\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryReadInterface
{
    public function getAll(): Collection;

    public function getById(int $id): Category;
}
