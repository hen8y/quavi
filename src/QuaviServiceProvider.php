<?php

namespace Quavi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class QuaviServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::directive('quaviCss', function (): string {
            return '<?php echo quaviCss(); ?>';
        });

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'quavi');

        $this->publishes([__DIR__ . '/../config/quavi.php' => config_path('quavi.php')], 'quavi-config');
        $this->publishes([__DIR__ . '/../public/build' => public_path('vendor/hen8y/quavi')], 'quavi-assets');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/quavi.php', 'quavi');

        $this->app->singleton('quavi', function ($app): Quavi {
            return $app->make(Quavi::class);
        });
    }
}
