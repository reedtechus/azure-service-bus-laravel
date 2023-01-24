<?php

namespace ReedTech\AzureServiceBus;

use ReedTech\AzureServiceBus\Commands\ServiceBusAuthCommand;
use ReedTech\AzureServiceBus\Commands\ServiceBusPeekMessageCommand;
use ReedTech\AzureServiceBus\Commands\ServiceBusPopMessageCommand;
use ReedTech\AzureServiceBus\Commands\ServiceBusSendMessageCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
			->hasConfigFile('azure-service-bus')
			// ->hasViews()
			// ->hasMigration('create_azure-service-bus-laravel_table')
			->hasCommands(
				ServiceBusAuthCommand::class,
				ServiceBusSendMessageCommand::class,
				ServiceBusPeekMessageCommand::class,
				ServiceBusPopMessageCommand::class,

			);
	}
}
