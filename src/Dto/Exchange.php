<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Dto;

use Mafin\RabbitmqApi\Enums\TypeEnum;

class Exchange extends BaseDataTransferObject
{
    protected bool $ignoreMissing = true;
    public string $name;
    public TypeEnum $type;
    public bool $auto_delete;
    public bool $durable;
    public bool $internal;

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): TypeEnum
    {
        return $this->type;
    }

    public function isAutoDelete(): bool
    {
        return $this->auto_delete;
    }

    public function isDurable(): bool
    {
        return $this->durable;
    }

    public function isInternal(): bool
    {
        return $this->internal;
    }
}