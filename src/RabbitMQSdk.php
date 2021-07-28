<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi;

use GuzzleHttp\Exception\ConnectException;
use Mafin\Internal\Interfaces\ApiClientInterface;
use Mafin\Internal\Interfaces\HttpActionInterface;
use Mafin\Internal\SimpleHttpAction;
use Mafin\RabbitmqApi\Actions\ExchangeAction;
use Mafin\RabbitmqApi\Actions\QueueAction;
use Mafin\RabbitmqApi\Actions\QueueBindingsAction;
use Mafin\RabbitmqApi\Dto\Bindings;
use Mafin\RabbitmqApi\Dto\ExchangeRequest;
use Mafin\RabbitmqApi\Dto\Exchanges;
use Mafin\RabbitmqApi\Dto\QueueRequest;
use Mafin\RabbitmqApi\Dto\Queues;

class RabbitMQSdk implements RabbitMQSdkInterface
{
    private ApiClientInterface $client;

    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
    }

    public function getExchange(ExchangeRequest $request): Exchanges
    {
        $action = new ExchangeAction($request);
        return $this->client->perform($action);
    }

    public function getQueue(QueueRequest $request): Queues
    {
        $action = new QueueAction($request);
        return $this->client->perform($action);
    }

    public function getQueueBindings(QueueRequest $request): Bindings
    {
        $action = new QueueBindingsAction($request);
        return $this->client->perform($action);
    }

    public function serviceIsAlreadyUp(): bool
    {
        $action = new SimpleHttpAction(HttpActionInterface::GET_METHOD, '');
        try {
            $this->client->perform($action);
        } catch (ConnectException $exception) {
            return false;
        }

        return true;
    }
}