<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class InvalidReturnItemListSchema extends Collection
{
    public function offsetGet($key): InvalidReturnItemSchema
    {
        return parent::offsetGet($key);
    }
}
