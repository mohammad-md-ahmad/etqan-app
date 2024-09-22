<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/signup', function () {
    return view('auth/signup');
})->name('signup.view');

Route::post('/signup', [AuthController::class, 'registerUser'])->name('signup');
