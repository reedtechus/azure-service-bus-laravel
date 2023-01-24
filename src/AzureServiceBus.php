<?php

namespace ReedTech\AzureServiceBus;

use ReedTech\AzureServiceBus\Requests\PeekMessage;
use ReedTech\AzureServiceBus\Requests\PopMessage;
use ReedTech\AzureServiceBus\Requests\SendMessage;

class AzureServiceBus
{
	public static function peek(string $path, ?string $subscription = null): object
	{
		$request = new PeekMessage($path, $subscription);
		$response = (new ServiceBusApi())->send($request)->throw();
		return $response->object();
	}

	public static function pop(string $path, ?string $subscription = null): object
	{
		$request = new PopMessage($path, $subscription);
		$response = (new ServiceBusApi())->send($request)->throw();
		return $response->object();
	}

	public static function send(string $path, array $payload): bool
	{
		$request = new SendMessage($path, $payload);
		$response = (new ServiceBusApi())->send($request)->throw();
		return $response->successful();
	}
}
