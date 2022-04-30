<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');

Route::post('/store', [RegisterController::class, 'store'])
    ->name('store');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('enter');

Route::post('/logout', [LogoutController::class, 'index'])
    ->name('logout');

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts');

Route::post('/posts', [PostController::class, 'store']);
