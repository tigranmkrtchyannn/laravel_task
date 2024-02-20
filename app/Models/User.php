<?php

namespace App\Models;

use App\DTO\RegistrationDto;
use Brick\Math\BigInteger;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;




class User extends Authenticatable
{
    use HasApiTokens,  Notifiable;

    /**
     * The attributes that are mass assignable.
     *pr
     *
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     *
     * @package App\Models\Ads\Ads
     *
     * @property BigInteger $id
     * @property string $name
     * @property string $password
     * @property string $email
     *
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public static function createUsers(RegistrationDto $dto): User
    {
        $user = new  self();

        $user->setName($dto->name);
        $user->setEmail($dto->email);
        $user->setPassword($dto->password);
        $user->setRole($dto->role);

        return $user;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setEmail(string $email): void
    {
       $this->email =  $email;
    }
    public function  setPassword(string $password): void
    {

        $this->password =  $password;
    }
    public function  setRole(string $role): void
    {
        $this->role = $role;
    }

    public function basketItems()
    {
        return $this->hasMany(BasketItem::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites')->withTimestamps();
    }
}
