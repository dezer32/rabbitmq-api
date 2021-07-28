<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi;

use Mafin\RabbitmqApi\Dto\Bindings;
use Mafin\RabbitmqApi\Dto\ExchangeRequest;
use Mafin\RabbitmqApi\Dto\Exchanges;
use Mafin\RabbitmqApi\Dto\QueueRequest;
use Mafin\RabbitmqApi\Dto\Queues;
use Mafin\RabbitmqApi\Exceptions\CantFindDeclare;

interface RabbitMQSdkInterface
{
    public function serviceIsAlreadyUp(): bool;

    /**
     * @throws CantFindDeclare
     */
    public function getExchange(ExchangeRequest $request): Exchanges;

    /**
     * @throws CantFindDeclare
     */
    public function getQueue(QueueRequest $request): Queues;

    public function getQueueBindings(QueueRequest $request): Bindings;
}