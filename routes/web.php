<?php

use App\Http\Controllers\MainController;
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
    Route::get('/admin/dashboard', [MainController::class, 'dashboard']);
});