<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::post('/cart/add', [\App\Http\Controllers\PedidoController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [\App\Http\Controllers\PedidoController::class, 'viewCart'])->name('cart.view');
Route::get('/checkout', [\App\Http\Controllers\PedidoController::class, 'checkout'])->name('checkout');
Route::post('/pedidos', [\App\Http\Controllers\PedidoController::class, 'store'])->name('pedidos.store');

Route::get('/pedidos', [\App\Http\Controllers\PedidoController::class, 'index'])->middleware('auth');
Route::get('/pedidos/{id}', [\App\Http\Controllers\PedidoController::class, 'show'])->middleware('auth');

// Produtos
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->middleware('auth');
Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])->middleware('auth');
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::get('/products/{id}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->middleware('auth');
Route::put('/products/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->middleware('auth');
Route::delete('/products/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->middleware('auth');

// Categorias
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->middleware('auth', 'is_admin');
Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth', 'is_admin');
Route::get('/categories/{id}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->middleware('auth', 'is_admin');
Route::put('/categories/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->middleware('auth', 'is_admin');
Route::delete('/categories/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('auth', 'is_admin');

Route::get('/profile', [\App\Http\Controllers\UserController::class, 'edit'])->middleware('auth');
Route::put('/profile', [\App\Http\Controllers\UserController::class, 'update'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/github', function () {
    return view('github');
});