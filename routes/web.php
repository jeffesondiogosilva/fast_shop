<?php

use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\ProductCategoryController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\HomeController;
use Illuminate\Support\Facades\Route;

// Inclui rotas da loja
require base_path('routes/store.php');

// Rota do painel (sem middleware)
Route::prefix('panel')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});

// Rotas protegidas por autenticação
Route::middleware('auth')->prefix('panel')->group(function () {

    // Dashboard do admin
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    // Rotas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de produtos
    Route::resource('products', ProductController::class);
    Route::resource('products-categories', ProductCategoryController::class);

    // Rotas de clientes
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');


});

// Autenticação
require __DIR__.'/auth.php';
