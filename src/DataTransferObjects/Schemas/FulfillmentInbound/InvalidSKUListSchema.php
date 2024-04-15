<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class InvalidSKUListSchema extends Collection
{
    public function offsetGet($key): InvalidSKUSchema
    {
        return parent::offsetGet($key);
    }
}
