<?php

use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::prefix('search')->name('search.')->controller(SearchController::class)->group(function () {
        Route::get('/', 'search')->name('view');
    });

    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('/{username}', 'profile')->name('profile');
        Route::post('/{username}/follow', 'toggleFollow')->name('toggle-follow');
    });

    Route::prefix('notification')->name('notification.')->controller(NotificationsController::class)->group(function () {
        Route::get('/user/all', ['getUserNotifications'])->name('user.all');
    });
});
