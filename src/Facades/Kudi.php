<?php 

namespace Iamkarsoft\Kudi\Facades;
use Illuminate\Support\Facades\Facade;

class Kudi extends Facade{
    protected static function getFacadeAccessor(){
        return  'kudi';
    }
}