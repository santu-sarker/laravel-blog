<?php

// Route::get('/', function () {
//     return view('pages.home');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.user.home');
});

Route::view('/testing', 'includes.admin.navigation_bar');
