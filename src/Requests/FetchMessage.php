<?php

namespace ReedTech\AzureServiceBus\Requests;

use Saloon\Http\Request;

abstract class FetchMessage extends Request
{
	/**
	 * The endpoint of the request.
	 *
	 * @return string
	 */
	public function resolveEndpoint(): string
	{
		$urlParts = [
			$this->path,
		];

		if ($this->subscription !== null) {
			$urlParts[] = 'subscriptions';
			$urlParts[] = $this->subscription;
		}

		$urlParts[] = 'messages';
		$urlParts[] = 'head';

		return '/' . implode('/', $urlParts); // . "?timeout=60;
	}

	public function __construct(public string $path, public ?string $subscription)
	{
	}
}
