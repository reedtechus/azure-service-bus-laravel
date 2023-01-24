<?php

namespace ReedTech\AzureServiceBus\Requests;

use ReedTech\AzureServiceBus\Responses\PeekMessageResponse;
use Saloon\Enums\Method;

class PeekMessage extends FetchMessage
{
	/**
	 * The HTTP verb the request will use.
	 *
	 * @var Method
	 */
	protected Method $method = Method::POST;

	protected ?string $response = PeekMessageResponse::class;
}
