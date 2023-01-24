<?php

namespace ReedTech\AzureServiceBus\Requests;

use ReedTech\AzureServiceBus\Responses\SendMessageResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class SendMessage extends Request implements HasBody
{
	use HasJsonBody;

	/**
	 * The HTTP verb the request will use.
	 *
	 * @var Method
	 */
	protected Method $method = Method::POST;

	protected ?string $response = SendMessageResponse::class;

	/**
	 * The endpoint of the request.
	 *
	 * @return string
	 */
	public function resolveEndpoint(): string
	{
		return "/{$this->path}/messages";
	}

	public function __construct(public string $path, public array $payload)
	{
	}

	protected function defaultBody(): array
	{
		return $this->payload;
	}
}
