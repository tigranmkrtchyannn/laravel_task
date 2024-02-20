<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function create(string $name): ShopCategory
    {
        $category =  new self();
        $category->setName($name);
        return $category;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function products()
    {
        return $this->hasMany(ShopProduct::class);
    }


}
