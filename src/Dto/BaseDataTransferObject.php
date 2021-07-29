<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Dto;

use Mafin\DTO\CustomizableDataTransferObject;

abstract class BaseDataTransferObject extends CustomizableDataTransferObject
{
    protected bool $ignoreMissing = true;
}
