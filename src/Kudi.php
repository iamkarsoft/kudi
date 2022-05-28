<?php

namespace Iamkarsoft\Kudi;

use Illuminate\Support\Facades\Facade;

class Kudi extends Facade
{

    public function __call($provider, $arguments)
    {
        return static::make($provider);
    }

    protected static function getFacadeAccessor()
    {
        return Kudi::class;
    }

    public static function make($provider)
    {
        $class = "\\Iamkarsoft\\Kudi\\Providers\\" . ucwords($provider);


        if (class_exists($class)) {
            return new $class();
        }
    }
}
