<?php

namespace ReedTech\AzureServiceBus\Commands;


use Illuminate\Console\Command;
use ReedTech\AzureServiceBus\AzureServiceBus;
use ReedTech\AzureServiceBus\Requests\PopMessage;
use ReedTech\AzureServiceBus\ServiceBusApi;
use Saloon\Exceptions\Request\RequestException;

class ServiceBusPopMessageCommand extends Command
{
	public $signature = 'azure:service-bus:messages:pop {path : The path to the queue or topic} {subscription? : The subscription to peek from}';

	public $description = 'Pops a message from a given path.';

	public function handle(): int
	{
		$path = $this->argument('path');
		$subscription = $this->argument('subscription');

		try {
			// Destructively Pop the next message off the queue/subscription
			$dataObject = AzureServiceBus::pop($path, $subscription);

			$this->info('Message popped sucessfully!');
			dump($dataObject);

			return self::SUCCESS;
		} catch (RequestException $e) {
			if ($e->getStatus() == 204) {
				$this->warn('No messages to pop');
			} else {
				$this->error('Failed to pop message: ' . $e->getMessage());
			}
			return Command::FAILURE;
		}
	}
}
