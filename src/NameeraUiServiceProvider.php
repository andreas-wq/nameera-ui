<?php

namespace Nameera\Ui;

use Illuminate\Support\ServiceProvider;

class NameeraUiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nameera');

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Publish assets
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/nameera'),
        ], 'nameera-assets');
    }
}