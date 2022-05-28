<?php

namespace Iamkarsoft\Kudi;

use Illuminate\Support\Facades\Facade;

class Kudi extends Facade
{

    public function __call($provider, $arguments)
    {
        return static::make($provider);
    }

    public function __construct()
    {
        $this->provider = config('kudi.kudi_api_provider');
    }


    /**
     * @param $amount
     * @param $currency
     * @return mixed
     */

    public function convertFrom($currency, $amount)
    {
        $provider =  Kudi::make(preg_replace("/\s+/", "", ucwords($this->provider)));
        $data = $provider->convertFrom($currency, $amount);
        return $data;
    }

    /** 
     * @param $amount
     * @param $currency
     * @return mixed
     * Converting from GHS to chose Currency
     */
    public function convertTo($currency, $amount)
    {
        $provider =  Kudi::make(preg_replace("/\s+/", "", ucwords($this->provider)));
        $data = $provider->convertTo($currency, $amount);
        return $data;
    }

    /**
     * Dynamically return class
     * @param $provider
     */

    public static function make($provider)
    {
        $class = "\\Iamkarsoft\\Kudi\\Providers\\" . ucwords($provider);


        if (class_exists($class)) {
            return new $class();
        }
    }
}
