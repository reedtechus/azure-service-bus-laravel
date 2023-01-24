<?php

namespace ReedTech\AzureServiceBus\Requests;

use Illuminate\Support\Facades\Cache;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;
use Saloon\Traits\Body\HasFormBody;

class FetchToken extends SoloRequest implements Cacheable, HasBody
{
	use HasCaching, HasFormBody;

	/**
	 * The HTTP verb the request will use.
	 *
	 * @var Method
	 */
	protected Method $method = Method::POST;

	/**
	 * The endpoint of the request.
	 *
	 * @return string
	 */
	public function resolveEndpoint(): string
	{
		$tenant = config('azure-service-bus.tenant');
		return 'https://login.microsoftonline.com/' . $tenant . '/oauth2/v2.0/token';
	}

	public function __construct()
	{
		// Saloon v2 does not support this method
		// $this->safeCacheMethods = [
		//     Saloon::GET,
		//     Saloon::OPTIONS,
		//     Saloon::POST,
		// ];
	}

	protected function defaultBody(): array
	{
		return [
			'client_id' => config('services.azure.client_id'),
			'client_secret' => config('services.azure.client_secret'),
			'grant_type' => 'client_credentials',
			'scope' => 'https://servicebus.azure.net/.default',
		];
	}

	public function resolveCacheDriver(): Driver
	{
		return new LaravelCacheDriver(Cache::store(config('azure-service-bus.cache_driver')));
	}

	public function cacheExpiryInSeconds(): int
	{
		return 3500; // Defined in the API spec, minus 100 seconds
	}
}
