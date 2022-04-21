<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $req) {
    return "Welcome Home";
});


Auth::routes(["verify" => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart')->middleware("verified");

Route::group(["prefix" => "admin"],  function (){
    Route::get('/product/{Page?}',  [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin')->middleware("verified");
    Route::get('/brand/{Page?}',    [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin')->middleware("verified");
    Route::get('/category/{Page?}', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin')->middleware("verified");
});

