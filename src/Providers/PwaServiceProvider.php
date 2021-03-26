<?php

namespace Agenciafmd\Pwa\Providers;

use Illuminate\Support\ServiceProvider;

class PwaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->providers();

        $this->publish();
    }

    public function register()
    {
        $this->loadConfigs();
    }

    protected function providers()
    {
        $this->app->register(BladeServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    protected function loadConfigs()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-pwa.php', 'laravel-pwa');
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../config' => base_path('config'),
        ], 'laravel-pwa:config');

        $this->publishes([
            __DIR__ . '/../resources/css' => public_path('vendor/laravel-pwa/css'),
            __DIR__ . '/../resources/images' => public_path('vendor/laravel-pwa/images'),
//            __DIR__ . '/../resources/js' => public_path('vendor/laravel-pwa/js'),
        ], 'laravel-pwa:assets');
    }
}
