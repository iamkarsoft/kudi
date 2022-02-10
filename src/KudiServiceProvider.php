<?php

namespace Iamkarsoft\Kudi;

use Illuminate\Support\ServiceProvider;
use Iamkarsoft\Kudi\Facades\Kudi;
use Illuminate\Foundation\config;
use Illuminate\Support\mergeConfigFrom;

class KudiServiceProvider extends ServiceProvider
{


    public function boot()
    {

        // publish config file
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/kudi.php' => config_path('kudi.php'),
            ], 'config');
        }
    }


    public function register()
    {
        $this->app->singleton('kudi',Kudi::class);

        $this->mergeConfigFrom(__DIR__ . '/../config/kudi.php', 'kudi');
    }
}