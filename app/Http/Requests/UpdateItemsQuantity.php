<?php

namespace App\Http\Requests;


class UpdateItemsQuantity extends BasketRequest
{
    public function getProductId(): int
     {
         return $this->route(self::PRODUCT_ID);
     }

}
