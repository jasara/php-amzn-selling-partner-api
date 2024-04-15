<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class RejectedShippingServiceListSchema extends Collection
{
    public function offsetGet($key): RejectedShippingServiceSchema
    {
        return parent::offsetGet($key);
    }
}
