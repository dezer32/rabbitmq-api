<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Enums;

use MyCLabs\Enum\Enum;

class TypeEnum extends Enum
{
    private const DIRECT = 'direct';
    private const TOPIC = 'topic';
}
