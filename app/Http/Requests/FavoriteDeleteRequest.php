<?php

namespace App\Http\Requests;


class FavoriteDeleteRequest extends FavoriteRequest
{
  public function  getProductId(): int
  {
      return $this->route(self::PRODUCT_ID);
  }
}
