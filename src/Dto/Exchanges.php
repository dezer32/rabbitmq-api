<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Dto;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class Exchanges extends DataTransferObjectCollection
{
    public function current(): Exchange
    {
        return parent::current();
    }
}
