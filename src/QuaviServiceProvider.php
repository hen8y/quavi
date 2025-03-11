<?php

namespace Quavi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class QuaviServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'quavi');
        $this->publishes([__DIR__ . '/../config/quavi.php' => config_path('quavi.php')], 'quavi-config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/quavi.php', 'quavi');
        $this->app->singleton('quavi', function ($app) { return $app->make(Quavi::class); });
    }
}