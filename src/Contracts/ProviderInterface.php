<?php

namespace Iamkarsoft\Kudi\Contracts;


interface ProviderInterface
{


    public function convertFrom($currency, $amount);

    public function convertTo($currency, $amount);
}
