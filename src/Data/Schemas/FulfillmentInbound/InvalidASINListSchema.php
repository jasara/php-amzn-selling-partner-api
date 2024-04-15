<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class InvalidASINListSchema extends Collection
{
    public function offsetGet($key): InvalidASINSchema
    {
        return parent::offsetGet($key);
    }
}
