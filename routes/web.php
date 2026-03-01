<?php

use App\Http\Controllers\AuthUserController;
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

Route::view('/admin', 'admin.dashboard');

Route::get("/admin/products", [ProductController::class, 'index'])->name('admin.products');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

