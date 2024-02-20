<?php

namespace App\Repository\Shop\write;

interface ShopProductRatingWriteRepositoryInterface
{
    public function insert(array $data): bool;
}
