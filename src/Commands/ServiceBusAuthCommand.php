<?php

namespace ReedTech\AzureServiceBus\Commands;


use Illuminate\Console\Command;
use ReedTech\AzureServiceBus\Requests\FetchToken;

class ServiceBusAuthCommand extends Command
{
	public $signature = 'azure:service-bus:auth';

	public $description = 'Validates that an authentication token can be retrieved from Azure Service Bus';

	public function handle(): int
	{
		$this->info('Fetching token for Azure Service Bus...');
		$response = (new FetchToken())->send();

		if ($response->failed()) {
			$this->error('Failed to get access token: ' . $response->status());
			return Command::FAILURE;
		}

		if ($response->isCached()) {
			$this->warn('Response was cached!');
		}

		dump($response->json());

		$this->comment('All done');

		return self::SUCCESS;
	}
}
