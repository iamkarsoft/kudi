<?php

namespace Iamkarsoft\Kudi;

use Illuminate\Support\ServiceProvider;

class KudiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        // publish config file
        $this->publishes([
            __DIR__ . '/../config/kudi.php' => config_path('kudi.php'),
        ], 'config');
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        // binding facades
        $this->app->bind('kudi', function () {
            return new Kudi();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/kudi.php', 'kudi');
    }
}
