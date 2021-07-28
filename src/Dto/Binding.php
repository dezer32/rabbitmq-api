<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Dto;

class Binding extends BaseDataTransferObject
{
    private string $source;
    private string $vhost;
    private string $destination;
    private string $destination_type;
    private string $routing_key;
    private array $arguments;
    private string $properties_key;

    public function getSource(): string
    {
        return $this->source;
    }

    public function getVhost(): string
    {
        return $this->vhost;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getDestinationType(): string
    {
        return $this->destination_type;
    }

    public function getRoutingKey(): string
    {
        return $this->routing_key;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function getPropertiesKey(): string
    {
        return $this->properties_key;
    }
}
