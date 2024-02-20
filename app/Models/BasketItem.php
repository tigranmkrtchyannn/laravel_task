<?php

namespace App\Models;

use App\DTO\BasketDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    use HasFactory;

    protected  $fillable=['quantity','user_id','product_id'];


    public static function create(BasketDto $basketDto): self
    {
        $basketItem = new self();
        $basketItem->setProductId($basketDto->productId);
        $basketItem->setUserId($basketDto->user);
        $basketItem->setQuantity($basketDto->quantity);

        return $basketItem;
    }

    public function updateItemQuantity(BasketDto $basketDto): self
    {
        $this->setQuantity($basketDto->quantity);

        return  $this;
    }

    public function setQuantity(?int $quantity): void
    {
        $this->quantity = max(1,$quantity);
    }
    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
