<?php

namespace ReedTech\AzureServiceBus\Commands;

use Illuminate\Console\Command;

class AzureServiceBusCommand extends Command
{
    public $signature = 'azure-service-bus-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
