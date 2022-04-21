<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

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




Route::middleware('auth:sanctum')->apiResource("proucts", ProductController::class);


Route::middleware('auth:sanctum')->apiResource("brand", App\Http\Controllers\BrandController::class);
Route::middleware('auth:sanctum')->apiResource("category", App\Http\Controllers\CategoryController::class);
Route::middleware('auth:sanctum')->apiResource("cart", App\Http\Controllers\CartController::class);