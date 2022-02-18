<?php

namespace Iamkarsoft\Kudi;
use Illuminate\Support\Facades\Http;


class KudiFactory
{

    /**
     * @param $amount
     * @param $currency
     * @return mixed
     */
    public function convertFrom($currency,$amount)
    {
        $api_key = config('kudi.currency_api_key');
        $currency = ucwords($currency);

        $response = Http::get("https://freecurrencyapi.net/api/v2/latest?apikey={$api_key}&base_currency={$currency}")['data'];
        $value = number_format($response['GHS'] * $amount,2, '.', ' ') ;

        return "{$value} GHS";
    }


    /**
     * @param $amount
     * @param $currency
     * @return mixed
     * Converting from GHS to chose Currency
     */

    public function convertTo($currency,$amount)
    {
        $api_key = config('kudi.currency_api_key');
        $currency = ucwords($currency);
        $response = Http::get("https://freecurrencyapi.net/api/v2/latest?apikey={$api_key}&base_currency=GHS")['data'];
        $value = number_format($response[$currency] * $amount,2,'.','') ;
        return "{$value} {$currency}";
    }

}
