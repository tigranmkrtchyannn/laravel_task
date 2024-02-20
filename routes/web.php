<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});


Route::get('/registration', function () {
    return view('registration_page');
});
Route::get('successRegistration', function () {
    return view('/successRegistration');
});


Route::get('/create_product', function () {
    return view('create_product');
});
Route::get('/edit_product', function () {
    return view('/edit_product');
});

Route::post('successRegistration', [AuthController::class, 'registration']);
Route::post('successRegistration', [AuthController::class, 'login']);


Route::get('/login', [AuthController::class, 'login'])->name('login');
//Route::post('/login', [AuthController::class, 'loginPost'])->name('login');





















