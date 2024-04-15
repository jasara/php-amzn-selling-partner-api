<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FulfillmentOrderItemListSchema extends Collection
{
    public function offsetGet($key): FulfillmentOrderItemSchema
    {
        return parent::offsetGet($key);
    }
}
