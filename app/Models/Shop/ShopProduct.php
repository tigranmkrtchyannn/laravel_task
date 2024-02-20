<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{

    use HasFactory;

    protected $fillable = ['product_id','title','description','price','image','category_id'];


    public function category()
    {
        return $this->belongsTo(ShopCategory::class);
    }


    public function ratings()
    {
        return $this->hasOne(ProductRating::class, 'product_id');
    }

}
