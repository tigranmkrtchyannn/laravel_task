<?php

namespace App\Repository\Shop\write;

interface ShopProductWriteRepositoryInterface
{
    public function insert(array $data): bool;
}
