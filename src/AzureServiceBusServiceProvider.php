<?php

namespace ReedTech\AzureServiceBus;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ReedTech\AzureServiceBus\Commands\AzureServiceBusCommand;

class AzureServiceBusServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('azure-service-bus-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_azure-service-bus-laravel_table')
            ->hasCommand(AzureServiceBusCommand::class);
    }
}
