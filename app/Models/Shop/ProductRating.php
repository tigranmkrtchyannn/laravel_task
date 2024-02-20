<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    protected $fillable =['product_id','rate','rating_count'];

    public function products()
    {
        return $this->hasMany(ShopProduct::class);
    }

}
