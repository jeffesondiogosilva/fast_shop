<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::resource('/', App\Http\Controllers\Store\StoreController::class);

Route::get('cliente/cadastro', [App\Http\Controllers\Store\CustomerController::class, 'register'])
    ->name('customer.register');

Route::get('cliente/login', [App\Http\Controllers\Store\CustomerController::class, 'login'])
    ->name('customer.login');
    
Route::resource('/customer', App\Http\Controllers\Store\CustomerController::class);


