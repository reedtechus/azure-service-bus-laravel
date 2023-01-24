<?php

namespace ReedTech\AzureServiceBus\Commands;


use Illuminate\Console\Command;
use ReedTech\AzureServiceBus\Requests\FetchToken;
use ReedTech\AzureServiceBus\Requests\SendMessage;
use ReedTech\AzureServiceBus\ServiceBusApi;

class ServiceBusSendMessageCommand extends Command
{
	public $signature = 'azure:service-bus:messages:send {path : The path to the queue or topic}';

	public $description = 'Sends a test message to the service bus.';

	public function handle(): int
	{
		$path = 'ip_request';
		$payload = ['address' => '127.0.0.1'];

		$this->info('Sending a message to the Azure Service Bus...');
		$response = (new ServiceBusApi())->send(new SendMessage($path, $payload));

		// Handle any errors
		if ($response->failed()) {
			$this->error('Failed to send message: ' . $response->status());
			return Command::FAILURE;
		}

		$this->info('Message sent sucessfully!');

		return self::SUCCESS;
	}
}
