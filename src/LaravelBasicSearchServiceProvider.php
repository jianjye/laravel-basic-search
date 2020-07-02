<?php

namespace Jianjye\LaravelBasicSearch;

use Illuminate\Support\ServiceProvider;

class LaravelBasicSearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/database/factories');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton('laravel-basic-search', function () {
            return new LaravelBasicSearch;
        });
    }
}
