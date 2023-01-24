<?php

namespace ReedTech\AzureServiceBus\Commands;


use Illuminate\Console\Command;
use ReedTech\AzureServiceBus\AzureServiceBus;

class ServiceBusSendMessageCommand extends Command
{
	public $signature = 'azure:service-bus:messages:send {path : The path to the queue or topic}';

	public $description = 'Sends a test message to the service bus.';

	public function handle(): int
	{
		$path = 'ip_request';
		$payload = ['address' => '127.0.0.1'];

		// Send a message to the queue/topic
		// This will throw an exception if it fails
		AzureServiceBus::send($path, $payload);

		$this->info('Message sent sucessfully!');

		return self::SUCCESS;
	}
}
