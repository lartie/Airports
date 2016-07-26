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
$country = Country::where('name_en', 'Russia')->first();

$city = $country->cities()->first();
$city->name_en;
$city->name_ru;

$country = $city->country()->first();
$country->name_en;
$country->name_ru;
$country->iso_code;

$airport = $city->airports()->first();
$airport->gmt_offset;
$airport->iata_code;
$airport->icao_code;

$city = $airport->city()->first();
```

## License 

MIT
