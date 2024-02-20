<?php

namespace App\Http\Requests;

class ProductMaxPrice extends ProductRequest
{
    public function getMaxPrice(): float
    {
        return $this->get(self::PRICE);
    }
}
