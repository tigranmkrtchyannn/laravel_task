<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group([
    'as' => 'passport.',
    'prefix' => config('passport.path', 'oauth'),
    'namespace' => '\Laravel\Passport\Http\Controllers',
], function () {
    Route::post('/registration', [AuthController::class, 'registration']);
    Route::post('/login', [AuthController::class, 'loginPost']);
});

Route::post('/images', [ImageController::class, 'imagePathGeneration']);

Route::prefix('/admin')->middleware(['check.admin'])->group(function () {
    Route::post('/products', [ProductController::class, 'create']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'delete']);

    Route::post('/categories', [CategoriesController::class, 'create']);
    Route::put('/categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('/categories/{id}', [CategoriesController::class, 'delete']);
});


Route::prefix('/categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index']);
    Route::get('/{id}', [CategoriesController::class, 'show']);
});

Route::prefix('/products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
});

Route::prefix('/basket')->group(function () {
    Route::middleware(['check.login'])->group(function () {
        Route::post('/', [BasketController::class, 'addBasket']);
        Route::delete('/basket', [BasketController::class, 'deleteItems']);
        Route::delete('/', [BasketController::class, 'deleteForUser']);
        Route::patch('/{product_id}', [BasketController::class, 'updateBasketQuantity']);
    });
});

Route::prefix('favorite')->group(function () {
    Route::middleware(['check.login'])->group(function () {
        Route::post('/', [FavoriteController::class, 'addFavorite']);
        Route::delete('/{product_id}', [FavoriteController::class, 'deleteFavorite']);
    });
});
