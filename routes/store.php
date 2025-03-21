<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::resource('/', App\Http\Controllers\Store\StoreController::class);

Route::get('cliente/login', [App\Http\Controllers\Store\CustomerController::class, 'login'])
    ->name('customer.login');

Route::post('cliente/entrar', [App\Http\Controllers\Store\CustomerController::class, 'authenticate'])
    ->name('customer.authenticate');

Route::resource('/customer', App\Http\Controllers\Store\CustomerController::class);

Route::resource('/produtos', App\Http\Controllers\Store\ProductController::class);
