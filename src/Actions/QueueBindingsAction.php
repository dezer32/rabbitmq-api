<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Actions;

use GuzzleHttp\Psr7\Response;
use Mafin\Internal\Interfaces\HttpActionInterface;
use Mafin\RabbitmqApi\Dto\Bindings;
use Mafin\RabbitmqApi\Dto\QueueRequest;

class QueueBindingsAction extends BaseHttpAction
{
    public const METHOD = HttpActionInterface::GET_METHOD;
    public const URI = '/api/queues/%s/%s/bindings';
    private QueueRequest $request;

    public function __construct(QueueRequest $request)
    {
        $this->request = $request;
    }

    public function mapResponse(Response $response): Bindings
    {
        $payload = $this->getJsonFromResponse($response);

        return new Bindings($payload);
    }

    public function getMethod(): string
    {
        return self::METHOD;
    }

    public function getUri(): string
    {
        return sprintf(
            self::URI,
            $this->request->getVhost(),
            $this->request->getName()
        );
    }
}
