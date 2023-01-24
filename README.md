![logo-print-hd-transparent](https://user-images.githubusercontent.com/77644584/200294033-8c4d0980-56ba-4443-96f0-9dde0753a4df.png)

# Azure Service Bus SDK for Laravel / PHP

## Provides an interface to Azure's Service Bus.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/reedtechus/azure-service-bus-laravel.svg?style=flat-square)](https://packagist.org/packages/reedtechus/azure-service-bus-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/reedtechus/azure-service-bus-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/reedtechus/azure-service-bus-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/reedtechus/azure-service-bus-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/reedtechus/azure-service-bus-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/reedtechus/azure-service-bus-laravel.svg?style=flat-square)](https://packagist.org/packages/reedtechus/azure-service-bus-laravel)

This package provides an interface to Azure Service Bus.

It implements the [Azure Service Bus REST API](https://docs.microsoft.com/en-us/rest/api/servicebus/) via [Saloon v2](https://github.com/Sammyjo20/Saloon/tree/v2).

> :warning: **Experimental:** This package is still in development and is not ready for production use.
> Breaking changes can still occur **without** a major version change until **1.0.0**.

## Installation

You can install the package via composer:

```bash
composer require reedtechus/azure-service-bus-laravel
```

<!-- You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="azure-service-bus-laravel-migrations"
php artisan migrate
``` -->

You can publish the config file with:

```bash
php artisan vendor:publish --tag="azure-service-bus-laravel-config"
```

This is the contents of the published config file:

```php
return [
	'tenant' => env('SERVICE_BUS_TENANT'),
	'namespace' => env('SERVICE_BUS_NAMESPACE'),
	'cache_driver' => env('SERVICE_BUS_CACHE_DRIVER', 'redis'),
];
```

<!-- Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="azure-service-bus-laravel-views"
``` -->

## Usage

### Send a Message to a Queue or Topic

```php
AzureServiceBus::send('queue_or_topic_name', ['payload_data' => 'goes_here'])
```

### Receive a Message from a Queue

Peek (Non-destructive read) a message from a queue:

```php
AzureServiceBus::peek('queue_name')
```

Peek (Non-destructive read) a message from a topic (via subscription):

```php
AzureServiceBus::peek('queue_name', 'subscription_name')
```

### Destructive Read

The above `peek` examples can be replaced with `pop` to perform a destructive read and remove the message from the queue / subscription.

Pop (Destructive read) a message from a queue:

```php
AzureServiceBus::pop('queue_name')
```

Pop (Destructive read) a message from a topic (via subscription):

```php
AzureServiceBus::pop('queue_name', 'subscription_name')
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Chris Reed](https://github.com/chrisreedio)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
