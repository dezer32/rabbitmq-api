<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Actions;

use GuzzleHttp\Psr7\Response;
use Mafin\Internal\BaseHttpAction as InternalBaseHttpAction;

abstract class BaseHttpAction extends InternalBaseHttpAction
{
    protected function getJsonFromResponse(Response $response): array
    {
        $content = (string) $response->getBody();
        $payload = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        return $payload;
    }
}
