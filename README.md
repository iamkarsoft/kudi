# Kudi

A laravel package to convert currency to / from Ghana Cedis(GHS)


## Installation

`composer require iamkarsoft\kudi`

## Publishing config files

`php artisan vendor:publish --provider="Iamkarsoft\Kudi\KudiServiceProvider" --tag="config"`


## Dependencies 

You'll need a [Free Currency API](https://freecurrencyapi.net/) Account and add `CURRENCY_API_KEY=Your_API_KEY` in your  `.env` file 


## Usage


Converting From Any Currency to GHS
```php 
 Kudi::convertFrom('USD',20); 
```
  
Converting to Any Currency from GHS
```php 
 Kudi::convertTo('EUR',10000);
```









	