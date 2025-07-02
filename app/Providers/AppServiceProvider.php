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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share global data with all Inertia responses
        \Inertia\Inertia::share([
            'pages' => function () {
                return \App\Models\Page::all();
            },
        ]);
    }
}
