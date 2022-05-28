<?php

namespace Iamkarsoft\Kudi;

use Illuminate\Support\Facades\Http;
use Iamkarsoft\Kudi\Providers\FixerApi;
use Iamkarsoft\Kudi\Providers\CurrencyDataApi;
use Iamkarsoft\Kudi\Providers\FreeCurrencyApi;
use Iamkarsoft\Kudi\Contracts\ProviderInterface;


class KudiFactory
{

    /**
     * @param $amount
     * @param $currency
     * @return mixed
     */

    public function __construct()
    {
        $this->provider = config('kudi.kudi_api_provider');;
    }



    public function convertFrom($currency, $amount)
    {



        if ($this->provider == 'free currency api') {
            $provider = new FreeCurrencyApi();
            $data = $provider->convertFrom($currency, $amount);
        }

        if ($this->provider == 'currency data api') {
            $provider = new CurrencyDataApi();
            $data = $provider->convertFrom($currency, $amount);
        }

        if ($this->provider == 'fixer api') {
            $provider = new FixerApi();
            $data = $provider->convertFrom($currency, $amount);
        }


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

        if ($this->provider == 'free currency api') {
            $provider = new FreeCurrencyApi();
            $data = $provider->convertTo($currency, $amount);
        }

        if ($this->provider == 'currency data api') {
            $provider = new CurrencyDataApi();
            $data = $provider->convertTo($currency, $amount);
        }

        return $data;
    }
}
