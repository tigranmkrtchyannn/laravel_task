<?php

namespace App\Models;

use App\DTO\ProductDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'count', 'category','price', 'category_id','image_path'];

    public static function create(ProductDto $productDTO): Product
    {
        $product =  new self();

        $product->setName($productDTO->name);
        $product->setPrice($productDTO->price);
        $product->setCount($productDTO->count);
        $product->setCategoryId($productDTO->category_id);
        $product->setImage($productDTO->image_path);

        return $product;
    }

    public function updateProduct(ProductDto $productDto)
    {
        $this->setName($productDto->name);
        $this->setCategoryId($productDto->category_id);
        $this->setCount($productDto->count);
        $this->setPrice($productDto->price);
        $this->setImage($productDto->image_path);

        return $this;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setPrice(float $price): void
    {
        $this->price =  $price;
    }
    public function  setCount(int $count): void
    {
        $this->count =  $count;
    }
    public function setCategoryId(int $id): void
    {
      $this->category_id = $id;
    }
    public function setImage(string $path): void
    {
        $this->image_path = $path;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function basketItems()
    {
        return $this->hasMany(BasketItem::class);
    }


}
