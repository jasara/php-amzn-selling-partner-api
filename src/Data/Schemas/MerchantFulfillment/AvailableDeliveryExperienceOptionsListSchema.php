<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class AvailableDeliveryExperienceOptionsListSchema extends Collection
{
    public function offsetGet($key): AvailableDeliveryExperienceOptionSchema
    {
        return parent::offsetGet($key);
    }
}
