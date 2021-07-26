<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Actions;

use GuzzleHttp\Psr7\Response;
use Mafin\Internal\Interfaces\HttpActionInterface;
use Mafin\RabbitmqApi\Dto\Exchanges;

class ExchangesAction extends BaseHttpAction
{
    public const METHOD = HttpActionInterface::GET_METHOD;
    public const URI = '/api/exchanges';

    public function mapResponse(Response $response): Exchanges
    {
        $payload = $this->getJsonFromResponse($response);

        return new Exchanges($payload);
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