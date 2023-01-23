<?php

namespace ReedTech\AzureServiceBus\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ReedTech\AzureServiceBus\AzureServiceBus
 */
class AzureServiceBus extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ReedTech\AzureServiceBus\AzureServiceBus::class;
    }
}
