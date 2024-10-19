<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::prefix('search')->name('search.')->controller(SearchController::class)->group(function () {
        Route::get('/', 'doSearch')->name('view');
        // Route::post('/', 'doSearch')->name('action');
    });

    Route::prefix('user')->name('user')->controller(UserController::class)->group(function () {
        Route::get('/{username}', 'profile')->name('profile');
    });
});
