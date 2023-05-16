<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products/{code}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{code}', [CategoryController::class, 'show'])->name('category.show');

