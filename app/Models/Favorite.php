<?php

namespace App\Models;

use App\DTO\FavoriteDto;
use App\Http\Requests\FavoriteRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected  $fillable = ['user_id', 'product_id'];

    public static function create(FavoriteDto $dto): self
    {
        $favorite = new self();

        $favorite->setProductId($dto->productId);
        $favorite->setUserId($dto->userId);

        return $favorite;
    }

    public function setProductId(int $id)
    {
        $this->product_id = $id;
    }

    public function setUserId(int $userId)
    {
        $this->user_id = $userId;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public  function product()
    {
        return $this->belongsTo(Product::class);
    }
}
