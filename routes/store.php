<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/', App\Http\Controllers\Store\StoreController::class);

Route::get('customer/register', [App\Http\Controllers\Store\CustomerController::class, 'register'])
    ->name('customer.register');
    
Route::resource('/customer', App\Http\Controllers\Store\CustomerController::class);


