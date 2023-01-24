<?php

namespace ReedTech\AzureServiceBus\Responses;

use Saloon\Http\Response;

class SendMessageResponse extends Response
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
