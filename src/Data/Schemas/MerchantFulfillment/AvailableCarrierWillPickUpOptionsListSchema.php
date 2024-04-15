<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class AvailableCarrierWillPickUpOptionsListSchema extends Collection
{
    public function offsetGet($key): AvailableCarrierWillPickUpOptionSchema
    {
        return parent::offsetGet($key);
    }
}
