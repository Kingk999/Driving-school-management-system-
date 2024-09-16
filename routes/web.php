<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth; 



Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


Route::get('/login', [AuthController::class, 'getLoginPage'])->name('auth.getLoginPage');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('getRegisterPage');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('auth.forgotPassword');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])
    ->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])
    ->name('password.reset');


Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');



Route::middleware(['auth'])->group(function () {
    
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
});
