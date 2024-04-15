<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class TemporarilyUnavailableCarrierListSchema extends Collection
{
    public function offsetGet($key): TemporarilyUnavailableCarrierSchema
    {
        return parent::offsetGet($key);
    }
}
