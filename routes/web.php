<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/user/signup', [AuthUserController::class, 'showRegister' ])->name('showRegister');
Route::post('/user/register', [AuthUserController::class, 'register'])->name('registerUser');


Route::get('/user/login', [AuthUserController::class, 'showLogin'])->name('showLogin');
Route::post('/users/login', [AuthUserController::class, 'login'])->name('login');

Route::get('/user/cart',[CartController::class, 'index'])->name('user.cart');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get("/admin/products", [ProductController::class, 'index'])->name('admin.products');





