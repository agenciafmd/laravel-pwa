<?php

namespace Agenciafmd\Pwa\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PwaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->providers();

        $this->loadViews();

        $this->loadBladeDirectives();

        $this->publish();
    }

    public function register()
    {
        $this->loadConfigs();
    }

    protected function providers()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'agenciafmd/pwa');
    }

    protected function loadBladeDirectives()
    {
        Blade::directive('laravelPwa', function () {
            return "<?php echo view('agenciafmd/pwa::header')->render(); ?>";
        });
    }

    protected function loadConfigs()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/pwa.php', 'pwa');
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/agenciafmd/pwa'),
        ], 'pwa:views');

        $this->publishes([
            __DIR__ . '/../config' => base_path('config'),
        ], 'pwa:config');

        $this->publishes([
            __DIR__ . '/../resources/css' => public_path() . '/css',
            __DIR__ . '/../resources/images' => public_path() . '/images',
//            __DIR__ . '/../resources/js' => public_path() . '/js',
        ], 'pwa:assets');
    }
}
