<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class InvalidSKUListSchema extends Collection
{
    public function offsetGet($key): InvalidSKUSchema
    {
        return parent::offsetGet($key);
    }
}
