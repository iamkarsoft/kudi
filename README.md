
## About
A Laravel package to convert currencies to/from Ghana Cedis(GHS).


## Installation

`composer require iamkarsoft\kudi`

## Publishing config files

`php artisan vendor:publish --provider="Iamkarsoft\Kudi\KudiServiceProvider" --tag="config"`


## Providers

You'll need to create accounts and get your api keys from the providers you wish to use.

- For [Free Currency API](https://freecurrencyapi.net/) Account and add `KUDI_API_KEY=Your_API_KEY` and `KUDI_API_PROVIDER="free currency api"` in your  `.env` file 
- For [Currency Data Api from Api layer](https://apilayer.com/marketplace/currency_data-api) Account and add `KUDI_API_KEY=Your_API_KEY` and `KUDI_API_PROVIDER="currency data api"` in your  `.env` file 
- For  [Fixer Api from Api Layer](https://apilayer.com/marketplace/fixer-api) Account and add `KUDI_API_KEY=Your_API_KEY` and `KUDI_API_PROVIDER="fixer api"` in your  `.env` file 


## Usage


1. **In a controller**

Converting From Any Currency to GHS

```php 
 Kudi::convertFrom('USD',20); 

// assigning result to a variable
$converted= Kudi::convertFrom('USD',20); 

```

Converting to Any Currency from GHS

```php 
 Kudi::convertTo('EUR',10000);

// assigning result to a variable
 $converted = Kudi::convertTo('EUR',10000);
```

2. **Using it in a blade template**

```php

// to get the value
{{$converted['value']}} 

// to get the currency
{{$converted['currency']}}

// to get the provider you're using
{{$converted['provider']}}
```


## Response

If your request is successful. your response will look something like the following:

<br>

```js
// converting from USD to Ghana Cedis
{
"value": "7.75",
"currency": "GHS",
"provider": "currency data api"
},

// converting to Euros
{
"value": "120.55",
"currency": "EUR",
"provider": "currency data api"
}
```









	
