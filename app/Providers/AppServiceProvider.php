<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    protected $listen = [
        Login::class => [
            SendLoginNotification::class,
        ],
    ];
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
