<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Actions;

use GuzzleHttp\Psr7\Response;
use Mafin\Internal\Interfaces\HttpActionInterface;
use Mafin\RabbitmqApi\Dto\Queues;

class QueuesAction extends BaseHttpAction
{
    private const METHOD = HttpActionInterface::GET_METHOD;
    private const URI = '/api/queues';

    public function mapResponse(Response $response): Queues
    {
        $payload = $this->getJsonFromResponse($response);

        return new Queues($payload);
    }

    public function getMethod(): string
    {
        return self::METHOD;
    }

    public function getUri(): string
    {
        return self::URI;
    }
}