<?php

use App\Http\Controllers\AuthUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/user/signup', [AuthUserController::class, 'showRegister' ])->name('showRegister');
Route::post('/user/register', [AuthUserController::class, 'register'])->name('registerUser');

Route::get('/user/login', [AuthUserController::class, 'showLogin'])->name('showLogin');
Route::post('/users/login', [AuthUserController::class, 'login'])->name('login');

