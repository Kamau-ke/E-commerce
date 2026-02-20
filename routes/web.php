<?php

use App\Http\Controllers\AuthUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/signup', [AuthUserController::class, 'create' ])->name('showRegister');
Route::get('/user/login', [AuthUserController::class, 'showLogin'])->name('showLogin');