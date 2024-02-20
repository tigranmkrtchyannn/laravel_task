<?php

namespace App\Repository\Write\Shop;

use App\Models\Shop;

class ShopInsertRepository implements ShopInsertRepositoryInterface
{
   public function insert(array $data): bool
   {
      return Shop::insert($data);
   }
}
