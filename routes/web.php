<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
->name('home');

Route::get('/user/signup', [AuthUserController::class, 'showRegister' ])->name('register');
Route::post('/user/register', [AuthUserController::class, 'register'])->name('user.register');


Route::get('/user/login', [AuthUserController::class, 'showLogin'])->name('login');
Route::post('/users/login', [AuthUserController::class, 'login'])->name('user.login');
Route::post('/user/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/user/cart',[CartController::class, 'index'])->name('user.cart');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

Route::middleware(['auth','checkRole'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get("/admin/products", [ProductController::class, 'index'])->name('admin.products');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
});


// categories routes
Route::post('/admin/category', [CategoryController::class,'store'])->name('categories.store');

// product routes

Route::post('/admin/product',[ProductController::class, 'store'])->name('product.store');

// Products from categories

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');




