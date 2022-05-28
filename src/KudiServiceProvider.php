<?php

namespace Iamkarsoft\Kudi;

use Iamkarsoft\Kudi\Facades;
use Iamkarsoft\Kudi\KudiFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\config;
use Illuminate\Support\mergeConfigFrom;

class KudiServiceProvider extends ServiceProvider
{


    public function boot()
    {
        // publish config file
        $this->publishes([
            __DIR__ . '/../config/kudi.php' => config_path('kudi.php'),
        ], 'config');
    }


    public function register()
    {
        //        $this->app->singleton('kudi', Kudi::class);
        // binding facades
        $this->app->bind('kudi', function () {
            return new KudiFactory();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/kudi.php', 'kudi');
    }
}
