<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class ShippingServiceListSchema extends Collection
{
    public function offsetGet($key): ShippingServiceSchema
    {
        return parent::offsetGet($key);
    }
}
