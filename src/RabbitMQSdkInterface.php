<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi;

use Mafin\RabbitmqApi\Dto\Exchanges;
use Mafin\RabbitmqApi\Dto\Queues;

interface RabbitMQSdkInterface
{
    public function getExchanges(): Exchanges;

    public function getQueues(): Queues;
}