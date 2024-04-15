<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class ReturnItemListSchema extends Collection
{
    public function offsetGet($key): ReturnItemSchema
    {
        return parent::offsetGet($key);
    }
}
