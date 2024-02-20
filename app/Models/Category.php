<?php

namespace App\Models;

use App\DTO\CategoriesDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected  $fillable=['name','image_path','parent_id'];

    public static function create(CategoriesDto $categoriesDto): Category
    {
        $category =  new self();

        $category->setCategoryName($categoriesDto->name);
        $category->setParent_id($categoriesDto->parent_id);
        $category->setImagePath($categoriesDto->image_path);

        return $category;
    }

    public function updateCategory(CategoriesDto $categoriesDto): self
    {
        $this->setCategoryName($categoriesDto->name);
        $this->setParent_id($categoriesDto->parent_id);
        $this->setImagePath($categoriesDto->image_path);

        return $this;
    }
    public function setCategoryName(string $name): void
    {
        $this->name = $name;
    }

    public function setImagePath(string $image): void
    {
        $this->image_path = $image;
    }

    public function setParent_id(?int $parent_id):void
    {
        $this->parent_id =$parent_id;
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
