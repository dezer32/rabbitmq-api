<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Dto;

class ExchangeRequest extends BaseDataTransferObject
{
    /*/api/exchanges/vhost/name*/
    public ?string $vhost = '%2F';
    public string $name;

    public function getVhost(): ?string
    {
        return $this->vhost;
    }

    public function getName(): string
    {
        return $this->name;
    }
}