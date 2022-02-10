<?php

namespace Iamkarsoft\Kudi;

class Kudi
{
    public function convertTo($amount, $currency = null)
    {
        return $this->app(Kudi::class)->create($amount, $currency);
    }

    public function convertFrom($amount, $currency = null)
    {
        return app(Kudi::class)->parse($amount, $currency);
    }
}