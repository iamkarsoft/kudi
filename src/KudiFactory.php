<?php

namespace Iamkarsoft\Kudi;

use Iamkarsoft\Kudi\Contracts\ProviderInterface;
use Illuminate\Support\Facades\Http;


class KudiFactory implements ProviderInterface
{

    /**
     * @param $amount
     * @param $currency
     * @return mixed
     */



    public function __construct()
    {
        $this->api_key = config('kudi.kudi_api_key');;
        $this->provider = config('kudi.kudi_api_provider');;
    }
    public function convertFrom($currency, $amount)
    {
        $currency = ucwords($currency);


        if ($this->provider == 'free currency api') {
            $response = Http::get("https://freecurrencyapi.net/api/v2/latest?apikey={$this->api_key}&base_currency={$currency}")['data'];
            $value = number_format($response['GHS'] * $amount, 2, '.', ' ');
        }


        if ($this->provider == 'currency data api') {
            $response = Http::withHeaders([
                'apikey' => $this->api_key
            ])
                ->get("https://api.apilayer.com/currency_data/convert?to=GHS&from={$currency}&amount={$amount}")['result'];
            $value = number_format($response, 2, '.', '');
        }


        $data = [
            'value' => $value,
            "currency" => "GHS",
            'provider' => $this->provider
        ];

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
        $currency = ucwords($currency);
        if ($this->provider == 'free currency api') {
            $response = Http::get("https://freecurrencyapi.net/api/v2/latest?apikey={$this->api_key}&base_currency=GHS")['data'];
            $value = number_format($response[$currency] * $amount, 2, '.', '');
        }

        if ($this->provider == 'currency data api') {
            $response = Http::withHeaders([
                'apikey' => $this->api_key
            ])
                ->get("https://api.apilayer.com/currency_data/convert?to={$currency}&from=GHS&amount={$amount}")['result'];
            $value = number_format($response, 2, '.', '');
        }

        $data = [
            'value' => $value,
            "currency" => $currency,
            'provider' => $this->provider
        ];

        return $data;
    }
}
