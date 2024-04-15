<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Illuminate\Support\Collection;

class ErrorListSchema extends Collection
{
    public function offsetGet($key): ErrorSchema
    {
        return parent::offsetGet($key);
    }
}
