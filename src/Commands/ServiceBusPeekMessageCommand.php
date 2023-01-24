<?php

namespace ReedTech\AzureServiceBus\Commands;


use Illuminate\Console\Command;
use ReedTech\AzureServiceBus\Facades\AzureServiceBus;
use ReedTech\AzureServiceBus\Requests\PeekMessage;
use ReedTech\AzureServiceBus\ServiceBusApi;

class ServiceBusPeekMessageCommand extends Command
{
	public $signature = 'azure:service-bus:messages:peek {path : The path to the queue or topic} {subscription? : The subscription to peek from}';

	public $description = 'Peeks a message from a given path.';

	public function handle(): int
	{
		$path = $this->argument('path');
		$subscription = $this->argument('subscription');

		// Non-destructively Peek the next message off the queue/subscription
		// This will throw an exception if it fails
		$dataObject = AzureServiceBus::peek($path, $subscription);

		$this->info('Message peek sucessfully!');

		dump($dataObject);

		return self::SUCCESS;
	}
}
