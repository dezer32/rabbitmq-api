<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Dto;

class Queue extends BaseDataTransferObject
{
    public array $arguments;
    public bool $auto_delete;
    public bool $exclusive;
    public bool $durable;

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function isAutoDelete(): bool
    {
        return $this->auto_delete;
    }

    public function isExclusive(): bool
    {
        return $this->exclusive;
    }

    public function isDurable(): bool
    {
        return $this->durable;
    }
}
