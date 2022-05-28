<?php

namespace Iamkarsoft\Kudi\Providers;

use Illuminate\Support\Facades\Http;
use Iamkarsoft\Kudi\Contracts\ProviderInterface;


class FreeCurrencyApi implements ProviderInterface
{
    public function __construct()
    {
        $this->api_key = config('kudi.kudi_api_key');
        $this->provider = config('kudi.kudi_api_provider');
    }

    public function convertFrom($currency, $amount)
    {
        $currency = ucwords($currency);


        $response = Http::get("https://freecurrencyapi.net/api/v2/latest?apikey={$this->api_key}&base_currency={$currency}")['data'];
        $value = number_format($response['GHS'] * $amount, 2, '.', ' ');
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
        $response = Http::get("https://freecurrencyapi.net/api/v2/latest?apikey={$this->api_key}&base_currency=GHS")['data'];
        $value = number_format($response[$currency] * $amount, 2, '.', '');

        $data = [
            'value' => $value,
            "currency" => $currency,
            'provider' => $this->provider
        ];

        return $data;
    }
}
