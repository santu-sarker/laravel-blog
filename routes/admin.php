<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return ('hello from admin');
});

Route::get('/dashboard', function () {
    return view('pages.admin.dashboard');
});
