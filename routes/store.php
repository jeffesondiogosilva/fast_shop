<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Store\OrderController;


Auth::routes();

Route::resource('/', App\Http\Controllers\Store\StoreController::class);

Route::get('customer/check', [App\Http\Controllers\Store\CustomerController::class, 'getLoggedCustomer'])
    ->name('customer.check');    

Route::get('cliente/login', [App\Http\Controllers\Store\CustomerController::class, 'login'])
    ->name('customer.login');

Route::post('cliente/entrar', [App\Http\Controllers\Store\CustomerController::class, 'authenticate'])
    ->name('customer.authenticate');

Route::resource('/customer', App\Http\Controllers\Store\CustomerController::class);

Route::resource('/produtos', App\Http\Controllers\Store\ProductController::class);

 // Rotas de Pedidos
 Route::resource('orders', OrderController::class);

 //Rotas do Carrinho
 Route::get('cart', [CartController::class, 'cart'])->name('cart');
 Route::get('cart/quantity/{id}', [CartController::class, 'getCartQuantity'])->name('get.quantity');
 Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
 Route::delete('cart', [CartController::class, 'cartRemove'])->name('cart.remove');
 Route::patch('cart', [CartController::class, 'cartUpdate'])->name('cart.update');