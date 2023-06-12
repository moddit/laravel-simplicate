# Laravel Simplicate API Client

For communicating with the Simplicate API.

## Version Compatibility

 Laravel             | Package 
:--------------------|:--------
 ^9.x                 | 0.9.1



## Installation

Via Composer:

``` bash
$ composer require moddit/laravel-simplicate
```

If you don't use auto-discover, register the Service Provider in your `config/app.php`:

```php
<?php
    'providers' => [
        // ...
        Moddit\Simplicate\Providers\SimplicateServiceProvider::class,
    ],
```


Publish the configuration file:

``` bash
php artisan vendor:publish --provider="Moddit\Simplicate\Providers\SimplicateServiceProvider"
```

## Configuration

Set up your `.env` file for the following values:

```dotenv
SIMPLICATE_DOMAIN=yoursimplicatesubdomain
SIMPLICATE_API_KEY=yoursimplicateapikey
SIMPLICATE_API_SECRET=yoursimplicateapisecret
```

## Usage

To Do.

### Fluent list syntax

For filterable, orderable listings, you can use fluent syntax to set parameters:

```php
<?php
/** @var \Moddit\Simplicate\Services\SimplicateService $service */
$leaveRecords = $service->hrm()
    ->offset(2)
    ->limit(10)
    ->sort('start_date')->descending()
    ->filter(['employee.id' => 'employee:aa24f3857730be716d44e34a3f0f8c3a'])
    ->allLeave();
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


[link-author]: https://github.com/moddit
[link-contributors]: ../../contributors
