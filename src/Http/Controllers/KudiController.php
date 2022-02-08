<?php 
namespace Iamkarsoft\Kudi\Http\Controllers;
use Illuminate\Support\Facades\Http;

class KudiController{

		public static function convertTo($currency,$amount){

            $response = Http::get('https://openexchangerates.org/api/convert/{$amount}/{$currency}/GHS?app_id='.config('currency_api_key'));
		}


		public  function convertFrom($currency,$amount){
$response = Http::get('https://openexchangerates.org/api/convert/{$amount}/GHS/{$currency}?app_id='.config('currency_api_key'));
		}
}
