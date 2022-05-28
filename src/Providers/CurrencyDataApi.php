<?php

namespace Iamkarsoft\Kudi\Providers;

use Illuminate\Support\Facades\Http;
use Iamkarsoft\Kudi\Contracts\ProviderInterface;


class CurrencyDataApi implements ProviderInterface
{
    public function __construct()
    {
        $this->api_key = config('kudi.kudi_api_key');
        $this->provider = config('kudi.kudi_api_provider');
    }

    public function convertFrom($currency, $amount)
    {

        $currency = ucwords($currency);


        $response = Http::withHeaders([
            'apikey' => $this->api_key
        ])
            ->get("https://api.apilayer.com/currency_data/convert?to=GHS&from={$currency}&amount={$amount}")['result'];
        $value = number_format($response, 2, '.', '');

        $data = [
            'value' => $value,
            "currency" => "GHS",
            'provider' => $this->provider
        ];

        return $data;
    }

    public function convertTo($currency, $amount)
    {

        $currency = ucwords($currency);

        $response = Http::withHeaders([
            'apikey' => $this->api_key
        ])
            ->get("https://api.apilayer.com/currency_data/convert?to={$currency}&from=GHS&amount={$amount}")['result'];
        $value = number_format($response, 2, '.', '');



        $data = [
            'value' => $value,
            "currency" => $currency,
            'provider' => $this->provider
        ];

        return $data;
    }
}
