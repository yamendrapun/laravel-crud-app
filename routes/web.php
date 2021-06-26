<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/logout', [MainController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function(){
    Route::get('/login', [MainController::class, 'login'])->name('auth.login');
    Route::get('/register', [MainController::class, 'register'])->name('auth.register');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.show');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); 
    Route::get('/posts/{post}/show', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{post}',[PostController::class, 'update']);
    Route::delete('/posts/{post}',[PostController::class, 'destroy']);
});
