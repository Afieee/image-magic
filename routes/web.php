<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register-berhasil', [\App\Http\Controllers\UsersController::class, 'register']);

Route::post('/login-berhasil', [\App\Http\Controllers\UsersController::class, 'login']);

Route::get('/halaman-home', [\App\Http\Controllers\UsersController::class, 'halamanHome'])->name('halaman-home');
