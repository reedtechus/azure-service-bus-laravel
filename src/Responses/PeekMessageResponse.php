<?php

namespace ReedTech\AzureServiceBus\Responses;

use Saloon\Http\Response;

/**
 * Class PeekMessageResponse
 * Reference: https://learn.microsoft.com/en-us/rest/api/servicebus/peek-lock-message-non-destructive-read#response
 * @package ReedTech\AzureServiceBus\Responses
 */
class PeekMessageResponse extends Response
{
	/**
	 * Determine if the request was successful.
	 *
	 * @return bool
	 */
	public function successful(): bool
	{
		return $this->status() == 201;
	}

	/**
	 * Determine if the request failed.
	 *
	 * @return bool
	 */
	public function failed(): bool
	{
		return !$this->successful();
	}
}
