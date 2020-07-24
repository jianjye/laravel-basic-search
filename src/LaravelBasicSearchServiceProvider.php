<?php

namespace JianJye\LaravelBasicSearch;

use Illuminate\Support\ServiceProvider;

class LaravelBasicSearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
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
