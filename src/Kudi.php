<?php

namespace Iamkarsoft\Kudi;
use Illuminate\Support\Facades\Facade;
class Kudi extends Facade
{
     protected static function getFacadeAccessor()
        {
            return Kudi::class;
        }
}