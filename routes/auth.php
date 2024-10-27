<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/signup', function () {
        return view('auth/signup');
    })->name('signup.view');

    Route::post('/signup', [AuthController::class, 'registerUser'])->name('signup');

    Route::get('/login', function () {
        return view ('auth/login');
    })->name('login.view');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
