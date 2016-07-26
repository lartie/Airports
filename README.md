# Airports for Laravel 5

## Install

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
