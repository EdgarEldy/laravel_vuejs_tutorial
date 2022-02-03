<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Categories routes
Route::get('categories/list', [CategoryController::class, 'list']);
Route::apiResource('categories', CategoryController::class);

// Products routes
Route::get('products/list', [ProductController::class])->name('products.list');
Route::apiResource('products', ProductController::class);

// Customers routes
Route::get('customers/list', [CustomerController::class, 'list'])->name('customers.list');
Route::apiResource('customers', CustomerController::class);

// Orders routes
Route::apiResource('orders', OrderController::class);
