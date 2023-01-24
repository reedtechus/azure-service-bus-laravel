<?php

namespace ReedTech\AzureServiceBus\Responses;

use Saloon\Http\Response;

/**
 * Class PopMessageResponse
 *
 * Reference: https://docs.microsoft.com/en-us/rest/api/servicebus/delete-message
 * https://learn.microsoft.com/en-us/rest/api/servicebus/receive-and-delete-message-destructive-read#response
 * @package ReedTech\AzureServiceBus\Responses
 */
class PopMessageResponse extends Response
{
	/**
	 * Determine if the request was successful.
	 *
	 * @return bool
	 */
	public function successful(): bool
	{
		return $this->status() == 200;
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
