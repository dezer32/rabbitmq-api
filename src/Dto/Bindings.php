<?php

declare(strict_types=1);

namespace Mafin\RabbitmqApi\Dto;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class Bindings extends DataTransferObjectCollection
{
    public function current(): Binding
    {
        return parent::current();
    }
}