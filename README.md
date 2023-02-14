# A laravel package to fetch Nepal data (Provinces, Districts, Municipalities).

[![Issues](https://img.shields.io/github/issues/kodefarmers/nepaldata.svg?style=flat-square)](https://github.com/kodefarmers/nepaldata/issues)
[![Latest Version](https://img.shields.io/github/v/release/kodefarmers/nepaldata.svg?style=flat-square)](https://github.com/kodefarmers/nepaldata/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/kodefarmers/nepaldata.svg?style=flat-square)](https://packagist.org/packages/kodefarmers/nepaldata)

NepalData is a laravel package that provides easy access to information about Nepal: Provinces, Districts, Municipalities. With this package, you can quickly and easily retrieve data about Nepal to use in your Laravel application. 

## Installation

You can install the package via Composer:

```bash
$ composer require kodefarmers/nepaldata
```

The Laravel facade and service provider are registered through auto-discovery, so you can instantly start using it.

## Usage

This package publishes a Laravel facade for easier usage:

```php
use KodeFarmers\NepalData\Facades\NepalData;

return NepalData::getAllData(); // returns all data i.e provinces with its districts with its localbodies
return NepalData::getAllDataInDevanagari(); // returns all data in nepali text

return NepalData::getProvinces();
return NepalData::getProvincesInDevanagari();

return NepalData::getProvincesWithDistricts();
return NepalData::getProvincesWithDistrictsInDevanagari();

return NepalData::getDistricts();
return NepalData::getDistrictsInDevanagari();

return NepalData::getDistrictsWithLocalBodies();
return NepalData::getDistrictsWithLocalBodiesInDevanagari();
```

Example:
```php
return NepalData::getAllData(); // it'll return:
{
  "Province No. 1": {
    "Taplejung": {
      "Ma.Na.Pa.": [],
      "Upa.Ma.": [],
      "Na.Pa.": [
        "Taplejung(Phungling)"
      ],
      "Ga.Pa.": [
        "Sirijangha",
        "AathraiTriveni",
        "PathibharaYangwarak",
        "Meringden",
        "Sidingwa",
        "Phaktanglung",
        "MaiwaKhola",
        "MikwaKhola"
      ]
    },
    .
    .

```
## Contributing
We welcome contributions from the community! If you have an idea for a new feature or improvement, please submit a pull request. We also appreciate bug reports and other feedback.

To get started with contributing, simply fork this repository, make your changes, and submit a pull request.

## License

This project is licensed under [MIT](https://opensource.org/license/mit-0/)

## Self-Promotion

Star the repository on [Github](https://github.com/kodefarmers/nepaldata)

Follow on [Github](https://github.com/kodefarmers)

