# Intervention Eloquent HashID

[![Latest Version](https://img.shields.io/packagist/v/intervention/eloquent-hashid.svg)](https://packagist.org/packages/intervention/eloquent-hashid)

This package provides a trait to easily encode and decode [hashids](https://github.com/vinkla/hashids) in your Eloquent models. Every model gets an attribute and a scope for hashid queries.

## Installation

You can install this package with Composer.

Require the package via Composer:

    $ composer require intervention/eloquent-hashid

Laravel will automatically discover the packages service provider class.

## Setup

After installation you're able to publish the configuration file to your Laravel application with the following command.

    $ php artisan vendor:publish --provider="Intervention\EloquentHashid\Laravel\EloquentHashidServiceProvider"

You will find a new config file in `config/hashid.php`, which you can customize. **I strongly suggest to change at least the `salt_prefix` option to your own value.**

## Usage

### Code Example

#### Eloquent Model Trait

By including `Intervention\EloquentHashid\HasHashid` your [Eloquent Model](https://laravel.com/docs/eloquent) gets a new `hashid` attribute, which is created based on the models classname, the key and the salt prefix. You're also able to query models with the now added `hashid()` scope.

```php
use Intervention\EloquentHashid\HasHashid;

class Item extends Model
{
    use HasHashid;
}

// query with scope
$item = App\Models\Item::hashid('Ma93ka')->firstOrFail();

// access hashid attribute
$hashid = $item->hashid
```


## License

Intervention Eloquent Hashid is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2021 [Oliver Vogel](https://olivervogel.com/)
