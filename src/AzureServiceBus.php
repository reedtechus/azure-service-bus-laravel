<?php

namespace ReedTech\AzureServiceBus;

use ReedTech\AzureServiceBus\Requests\PeekMessage;
use ReedTech\AzureServiceBus\Requests\PopMessage;
use ReedTech\AzureServiceBus\Requests\SendMessage;

class AzureServiceBus
{
	public function peek(string $path, ?string $subscription): object
	{
		$request = new PeekMessage($path, $subscription);
		$response = (new ServiceBusApi())->send($request);
		$response->throw();
		return new $response->object();
	}

	public function pop(string $path, ?string $subscription): object
	{
		$request = new PopMessage($path, $subscription);
		$response = (new ServiceBusApi())->send($request);
		$response->throw();
		return new $response->object();
	}

	public function send(string $path, array $payload): bool
	{
		$request = new SendMessage($path, $payload);
		$response = (new ServiceBusApi())->send($request);
		$response->throw();
		return $response->successful();
	}
}
