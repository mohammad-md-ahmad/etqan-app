<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/search', function () {
        $user = User::where('email', 'LIKE', '%user%')->whereLike(['first_name', 'email'], 'first')->firstOrFail();

        echo $user->email;
    });
});
