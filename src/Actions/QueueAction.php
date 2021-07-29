<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Actions;

use GuzzleHttp\Psr7\Response;
use Mafin\Internal\Interfaces\HttpActionInterface;
use Mafin\RabbitmqApi\Dto\QueueRequest;
use Mafin\RabbitmqApi\Dto\Queues;
use Mafin\RabbitmqApi\Exceptions\CantFindDeclare;
use Throwable;

class QueueAction extends BaseHttpAction
{
    private const METHOD = HttpActionInterface::GET_METHOD;
    private const URI = '/api/queues/%s/%s';
    private QueueRequest $request;

    public function __construct(QueueRequest $request)
    {
        $this->request = $request;
    }

    public function mapResponse(Response $response): Queues
    {
        $payload = $this->getJsonFromResponse($response);

        return new Queues($payload);
    }

    public function mapError(Throwable $e)
    {
        throw new CantFindDeclare(sprintf('Queue %s can not find.', $this->request->getName()), $e);
    }

    public function getMethod(): string
    {
        return self::METHOD;
    }

    public function getUri(): string
    {
        return sprintf(self::URI, $this->request->getVhost(), $this->request->getName());
    }
}
