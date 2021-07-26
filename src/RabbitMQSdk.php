<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi;

use Mafin\Internal\Interfaces\ApiClientInterface;
use Mafin\RabbitmqApi\Actions\ExchangesAction;
use Mafin\RabbitmqApi\Actions\QueuesAction;
use Mafin\RabbitmqApi\Dto\Exchanges;
use Mafin\RabbitmqApi\Dto\Queues;

class RabbitMQSdk implements RabbitMQSdkInterface
{
    private ApiClientInterface $client;

    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
    }

    public function getExchanges(): Exchanges
    {
        $action = new ExchangesAction();
        return $this->client->perform($action);
    }

    public function getQueues(): Queues
    {
        $action = new QueuesAction();
        return $this->client->perform($action);
    }
}