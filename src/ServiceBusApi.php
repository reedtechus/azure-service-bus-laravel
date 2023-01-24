<?php

namespace ReedTech\AzureServiceBus;

use Illuminate\Support\Facades\Cache;
use ReedTech\AzureServiceBus\Requests\FetchToken;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class ServiceBusApi extends Connector
{
	public function resolveBaseUrl(): string
	{
		$namespace = config('azure-service-bus.namespace');
		// dd('Namespace: ' . $namespace);
		return "https://$namespace.servicebus.windows.net";
	}


	public function defaultAuth(): Authenticator
	{
		// Fetch a token, it will probably be cached automatically
		// TOOD - Add conditional to swap between AD auth and SAS Auth
		// Azure Active Directory App Authentication
		// $request = (new AzureServiceBusAuthConnector())->send(new AuthRequest());
		// $tokenResponse = (new AzureServiceBusAuthConnector())->send(new AuthRequest());
		$request = new FetchToken();
		$token = Cache::remember(
			'azure_service_bus_token',
			$request->cacheExpiryInSeconds(),
			function () use ($request) {
				$tokenResponse = $request->send();
				return $tokenResponse->json('access_token');
			}
		);
		// dd('Azure Token: ' . $token);

		// SAS Token Authentication
		// $token = static::generateSASToken();
		// dd('SAS Token:'.$token);

		// return new TokenAuthenticator($token, 'SharedAccessSignature');
		return new TokenAuthenticator($token);
	}

	/**
	 * Define default headers
	 *
	 * @return string[]
	 */
	protected function defaultHeaders(): array
	{
		return [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
	}
}
