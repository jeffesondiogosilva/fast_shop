<?php

use Illuminate\Support\Facades\Route;

require base_path('routes/store.php');

Auth::routes();


Route::prefix('panel')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('products-categories', App\Http\Controllers\ProductCategoryController::class);
});

