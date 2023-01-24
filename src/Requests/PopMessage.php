<?php

namespace ReedTech\AzureServiceBus\Requests;

use ReedTech\AzureServiceBus\Responses\PopMessageResponse;
use Saloon\Enums\Method;

class PopMessage extends FetchMessage
{
	/**
	 * The HTTP verb the request will use.
	 *
	 * @var Method
	 */
	protected Method $method = Method::DELETE;

	protected ?string $response = PopMessageResponse::class;
}
