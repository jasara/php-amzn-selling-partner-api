<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class FulfillmentAvailabilityListSchema extends Collection
{
    public function offsetGet($key): FulfillmentAvailabilitySchema
    {
        return parent::offsetGet($key);
    }
}
