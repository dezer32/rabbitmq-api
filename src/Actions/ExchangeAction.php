<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Actions;

use GuzzleHttp\Psr7\Response;
use Mafin\Internal\Interfaces\HttpActionInterface;
use Mafin\RabbitmqApi\Dto\ExchangeRequest;
use Mafin\RabbitmqApi\Dto\Exchanges;
use Mafin\RabbitmqApi\Exceptions\CantFindDeclare;
use Throwable;

class ExchangeAction extends BaseHttpAction
{
    public const METHOD = HttpActionInterface::GET_METHOD;
    public const URI = '/api/exchanges/%s/%s';
    private ExchangeRequest $request;

    public function __construct(ExchangeRequest $request)
    {
        $this->request = $request;
    }

    public function mapResponse(Response $response): Exchanges
    {
        $payload = $this->getJsonFromResponse($response);

        return new Exchanges($payload);
    }

    public function mapError(Throwable $e)
    {
        throw new CantFindDeclare(sprintf('Exchange %s can not find.', $this->request->getName()));
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