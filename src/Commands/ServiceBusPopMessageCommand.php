<?php

namespace ReedTech\AzureServiceBus\Commands;


use Illuminate\Console\Command;
use ReedTech\AzureServiceBus\Requests\PopMessage;
use ReedTech\AzureServiceBus\ServiceBusApi;

class ServiceBusPopMessageCommand extends Command
{
	public $signature = 'azure:service-bus:messages:pop {path : The path to the queue or topic} {subscription? : The subscription to peek from}';

	public $description = 'Pops a message from a given path.';

	public function handle(): int
	{
		$path = $this->argument('path');
		$subscription = $this->argument('subscription');

		$this->info('Attempting to pop a message from the Azure Service Bus...');

		$request = new PopMessage($path, $subscription);
		$response = (new ServiceBusApi())->send($request);

		// Handle any errors
		if ($response->failed()) {
			$this->error('Failed to pop message: ' . $response->status());
			return Command::FAILURE;
		}

		$this->info('Message popped sucessfully!');

		dump($response->body());

		return self::SUCCESS;
	}
}
