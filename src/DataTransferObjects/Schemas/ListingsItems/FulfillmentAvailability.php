<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class FulfillmentAvailability extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): FulfillmentAvailabilitySchema
    {
        return parent::offsetGet($key);
    }
}
