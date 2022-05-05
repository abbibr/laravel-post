<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;


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

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::post('/posts', [PostController::class, 'store']);

Route::post('/posts/{post}', [PostController::class, 'destroy'])
    ->name('post.destroy');

Route::post('/posts/{post}/like', [PostLikeController::class, 'store'])
    ->name('posts.like');

Route::post('/posts/{post}/unlike', [PostLikeController::class, 'destroy'])
    ->name('posts.unlike');

Route::get('users/{user:username}/posts', [UserPostController::class, 'index'])
    ->name('users.posts');
