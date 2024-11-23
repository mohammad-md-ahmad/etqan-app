<?php

namespace App\Providers;

use App\Contracts\AuthServiceInterface;
use App\Contracts\NotificationServiceInterface;
use App\Contracts\SearchServiceInterface;
use App\Services\AuthService;
use App\Services\NotificationService;
use App\Services\SearchService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(SearchServiceInterface::class, SearchService::class);
        $this->app->bind(NotificationServiceInterface::class, NotificationService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('whereLike', function (string|array $attributes, string $searchTerm) {
            $this->where(function (Builder $query) use($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                }
            });

            return $this;
        });
    }
}
