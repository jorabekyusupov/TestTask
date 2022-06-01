<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('passport-login', [\App\Http\Controllers\UserController::class, 'Authlogin'])->name('passport.login');
Route::post('login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('register', [\App\Http\Controllers\UserController::class, 'register'])->name('register');

Route::middleware('auth:api')->group(function (){
    Route::apiResource('products', \App\Http\Controllers\ProductController::class);
    Route::apiResource('categories', \App\Http\Controllers\CategoryController::class);
    Route::apiResource('orders', \App\Http\Controllers\OrderController::class);
    Route::apiResource('order-items', \App\Http\Controllers\OrderItemController::class);
    Route::get('my-orders', [\App\Http\Controllers\OrderController::class, 'MyOrders'])->name('my-orders');
});
