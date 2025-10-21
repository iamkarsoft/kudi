<?php

namespace Iamkarsoft\Kudi;

use Iamkarsoft\Kudi\Contracts\ProviderInterface;

class Kudi
{
    protected string $provider;

    public function __construct()
    {
        $this->provider = config('kudi.kudi_api_provider');
    }

    /**
     * Convert from specified currency to GHS
     *
     * @param string $currency
     * @param float $amount
     * @return array
     */
    public function convertFrom(string $currency, float $amount): array
    {
        $provider = static::make(preg_replace("/\s+/", "", ucwords($this->provider)));
        return $provider->convertFrom($currency, $amount);
    }

    /**
     * Convert from GHS to specified currency
     *
     * @param string $currency
     * @param float $amount
     * @return array
     */
    public function convertTo(string $currency, float $amount): array
    {
        $provider = static::make(preg_replace("/\s+/", "", ucwords($this->provider)));
        return $provider->convertTo($currency, $amount);
    }

    /**
     * Dynamically return provider class
     *
     * @param string $provider
     * @return ProviderInterface|null
     */
    public static function make(string $provider): ?ProviderInterface
    {
        $class = "\\Iamkarsoft\\Kudi\\Providers\\" . ucwords($provider);

        if (class_exists($class)) {
            return new $class();
        }

        return null;
    }
}
