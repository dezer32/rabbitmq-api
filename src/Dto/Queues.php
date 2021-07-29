<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Dto;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class Queues extends DataTransferObjectCollection
{
    public function current(): Queue
    {
        return parent::current();
    }
}
