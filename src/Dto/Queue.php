<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Dto;

class Queue extends BaseDataTransferObject
{
    protected bool $ignoreMissing = true;
    public array $arguments;
    public bool $auto_delete;
    public bool $exclusive;
    public bool $durable;
}