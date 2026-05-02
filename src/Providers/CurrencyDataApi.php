<?php

namespace Iamkarsoft\Kudi\Providers;

use Illuminate\Support\Facades\Http;
use Iamkarsoft\Kudi\Contracts\ProviderInterface;


class CurrencyDataApi implements ProviderInterface
{
    protected string $api_key;
    protected string $provider;

    public function __construct()
    {
        $this->api_key = config('kudi.kudi_api_key');
        $this->provider = config('kudi.kudi_api_provider');
    }

    public function convertFrom(string $currency, float $amount): array
    {

        $currency = strtoupper($currency);


        $response = Http::withHeaders([
            'apikey' => $this->api_key
        ])
            ->get("https://api.apilayer.com/currency_data/convert?to=GHS&from={$currency}&amount={$amount}")
            ->json('result');
        $value = number_format($response, 2, '.', '');

        $data = [
            'value' => $value,
            "currency" => "GHS",
            'provider' => $this->provider
        ];

        return $data;
    }

    public function convertTo(string $currency, float $amount): array
    {

        $currency = strtoupper($currency);

        $response = Http::withHeaders([
            'apikey' => $this->api_key
        ])
            ->get("https://api.apilayer.com/currency_data/convert?to={$currency}&from=GHS&amount={$amount}")
            ->json('result');
        $value = number_format($response, 2, '.', '');



        $data = [
            'value' => $value,
            "currency" => $currency,
            'provider' => $this->provider
        ];

        return $data;
    }
}