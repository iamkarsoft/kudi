<?php

namespace Iamkarsoft\Kudi;

class KudiFactory
{

    /**
     * @param $amount
     * @param $currency
     * @return mixed
     */

    public function __construct()
    {
        $this->provider = config('kudi.kudi_api_provider');
    }

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
}
