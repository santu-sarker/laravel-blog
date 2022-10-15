<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\user\UserHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('user')->name('user.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::view('/login', 'auth.user.login')->name('login');
        Route::view('/register', 'auth.user.register')->name('register');
        Route::post('/create', [UserAuthController::class, 'create'])->name('create');
        Route::post('/login', [UserAuthController::class, 'dologin'])->name('login');
    });
    Route::middleware(['auth'])->group(function () {
        Route::get('/home', [UserHomeController::class, 'index'])->name('home');
        Route::post('/logout', [UserAuthController::class, 'dologout'])->name('logout');
    });
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'auth.admin.login')->name('login');
        Route::view('/register', 'auth.admin.register')->name('register');
        Route::post('/create', [AdminAuthController::class, 'create'])->name('create');
        Route::post('/login', [AdminAuthController::class, 'dologin'])->name('login');
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
        Route::post('/logout', [AdminAuthController::class, 'dologout'])->name('logout');

    });
});
