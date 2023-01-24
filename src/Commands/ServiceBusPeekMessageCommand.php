<?php

namespace ReedTech\AzureServiceBus\Commands;


use Illuminate\Console\Command;
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

		$this->info('Attempting to peek a message from the Azure Service Bus...');
		// $response = (new ServiceBusApi())->send(new SendMessage($path, $payload));
		// $request = new SendMessage($path, $payload);
		$request = new PeekMessage($path, $subscription);
		$response = (new ServiceBusApi())->send($request);

		// Handle any errors
		if ($response->failed()) {
			$this->error('Failed to peek message: ' . $response->status());
			return Command::FAILURE;
		}

		$this->info('Message peek sucessfully!');

		dump($response->body());

		return self::SUCCESS;
	}
}
