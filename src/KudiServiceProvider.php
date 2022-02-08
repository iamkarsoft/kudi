<?php

namespace Iamkarsoft\Kudi;

use Illuminate\Support\ServiceProvider;
use AppGharage\CustomsEstimate\Facades\Kudi;
use Iamkarsoft\Kudi\Http\Controllers\KudiController;
use Illuminate\Foundation\config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\mergeConfigFrom;

class KudiServiceProvider extends ServiceProvider
{


    public function boot()
    {


        // loading views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'package-namespace');


        // publish blade views
        $this->publishes([__DIR__ . '/../resources/views' => resource_path('views/'),], 'views');

        // publish javascript files
        $this->publishes([
            __DIR__ . '/../resources/js' => resource_path('/js/'),
        ], 'js');


        // loading routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // publish composer file
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/kudi.php' => config_path('kudi.php'),
            ], 'config');
        }
    }


    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kudi.php', 'kudi');
    }
}