<?php

namespace App\Repository\Providers;

use App\Repository\Read\Basket\BasketReadRepository;
use App\Repository\Read\Basket\BasketReadRepositoryInterface;
use App\Repository\Read\Category\CategoryReadInterface;
use App\Repository\Read\Category\CategoryReadRepository;
use App\Repository\Read\Favorite\FavoriteReadRepository;
use App\Repository\Read\Favorite\FavoriteReadRepositoryInterface;
use App\Repository\Read\Product\ProductReadInterface;
use App\Repository\Read\Product\ProductReadRepository;
use App\Repository\Read\User\UserReadRepository;
use App\Repository\Read\User\UserReadRepositoryInterface;
use App\Repository\Shop\read\ShopCategoryReadRepository;
use App\Repository\Shop\read\ShopCategoryReadRepositoryInterface;
use App\Repository\Shop\read\ShopProductReadRepository;
use App\Repository\Shop\read\ShopProductReadRepositoryInterface;
use App\Repository\Shop\write\ShopCategoryWriteRepository;
use App\Repository\Shop\write\ShopCategoryWriteRepositoryInterface;
use App\Repository\Shop\write\ShopProductRatingWriteRepository;
use App\Repository\Shop\write\ShopProductRatingWriteRepositoryInterface;
use App\Repository\Shop\write\ShopProductWriteRepository;
use App\Repository\Shop\write\ShopProductWriteRepositoryInterface;
use App\Repository\Write\Basket\BasketWriteRepository;
use App\Repository\Write\Basket\BasketWriteRepositoryInterface;
use App\Repository\Write\Category\CategoryWriteInterface;
use App\Repository\Write\Category\CategoryWriteRepository;
use App\Repository\Write\Favorite\FavoriteWriteRepository;
use App\Repository\Write\Favorite\FavoriteWriteRepositoryInterface;
use App\Repository\Write\Product\ProductWriteRepository;
use App\Repository\Write\Product\ProductWriteRepositoryInterface;
use App\Repository\Write\User\UserWriteRepository;
use App\Repository\Write\User\UserWriteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductReadInterface::class,ProductReadRepository::class);
        $this->app->bind(ProductWriteRepositoryInterface::class,ProductWriteRepository::class);
        $this->app->bind(CategoryReadInterface::class, CategoryReadRepository::class);
        $this->app->bind(CategoryWriteInterface::class, CategoryWriteRepository::class);
        $this->app->bind(BasketWriteRepositoryInterface::class,BasketWriteRepository::class);
        $this->app->bind(BasketReadRepositoryInterface::class, BasketReadRepository::class);
        $this->app->bind(UserWriteRepositoryInterface::class,UserWriteRepository::class);
        $this->app->bind(UserReadRepositoryInterface::class, UserReadRepository::class);
        $this->app->bind(FavoriteWriteRepositoryInterface::class,FavoriteWriteRepository::class);
        $this->app->bind(FavoriteReadRepositoryInterface::class, FavoriteReadRepository::class);
        $this->app->bind(ShopCategoryWriteRepositoryInterface::class, ShopCategoryWriteRepository::class);
        $this->app->bind(ShopProductRatingWriteRepositoryInterface::class,ShopProductRatingWriteRepository::class);
        $this->app->bind(ShopProductWriteRepositoryInterface::class,ShopProductWriteRepository::class);
        $this->app->bind(ShopCategoryReadRepositoryInterface::class, ShopCategoryReadRepository::class);
        $this->app->bind(ShopProductReadRepositoryInterface::class,ShopProductReadRepository::class);

    }

    public function boot(): void
    {
        //
    }
}
