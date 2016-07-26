# Airports for Laravel 5

[![Latest Stable Version](https://poser.pugx.org/lartie/airports/v/stable)](https://packagist.org/packages/lartie/airports)
[![Total Downloads](https://poser.pugx.org/lartie/airports/downloads)](https://packagist.org/packages/lartie/airports)
[![Latest Unstable Version](https://poser.pugx.org/lartie/airports/v/unstable)](https://packagist.org/packages/lartie/airports)
[![License](https://poser.pugx.org/lartie/airports/license)](https://packagist.org/packages/lartie/airports)
[![composer.lock](https://poser.pugx.org/lartie/airports/composerlock)](https://packagist.org/packages/lartie/airports)

## Install

```bash
composer require lartie/airports
```

```php
'providers' => [
  ...
  LArtie\Airports\AirportsServiceProvider::class,
]
```

```bash
php artisan vendor:publish

php artisan migrate

php artisan airports:install
```

## Usage

```php
$city = Country::where('name_en', 'Russia')->cities()->first();
$city->name_en;
$city->name_ru;

$country = City::where('name_en', 'Moscow')->country()->first();
$country->name_en;
$country->name_ru;
$country->iso_code;

$airport = City::where('name_en', 'Magnitogorsk')->airports()->first();
$airport->gmt_offset;
$airport->iata_code;
$airport->icao_code;

$city = City::where('iata_code', 'DME')->city()->first();
```

## License 

MIT
