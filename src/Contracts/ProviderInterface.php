<?php

namespace Iamkarsoft\Kudi\Contracts;

interface ProviderInterface
{
    /**
     * Convert from specified currency to GHS
     *
     * @param string $currency
     * @param float $amount
     * @return array
     */
    public function convertFrom(string $currency, float $amount): array;

    /**
     * Convert from GHS to specified currency
     *
     * @param string $currency
     * @param float $amount
     * @return array
     */
    public function convertTo(string $currency, float $amount): array;
}
