<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class ReturnItemListSchema extends Collection
{
    public function offsetGet($key): ReturnItemSchema
    {
        return parent::offsetGet($key);
    }
}
