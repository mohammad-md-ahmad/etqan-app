<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Middleware\ShareErrorsFromSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        then: function () {
            Route::namespace('Auth')
            ->prefix('auth')
            ->name('auth.')
            ->group(base_path('routes/auth.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(prepend: [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
        ]);

        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
