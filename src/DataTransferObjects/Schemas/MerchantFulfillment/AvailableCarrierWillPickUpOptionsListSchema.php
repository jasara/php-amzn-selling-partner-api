<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class AvailableCarrierWillPickUpOptionsListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): AvailableCarrierWillPickUpOptionSchema
    {
        return parent::offsetGet($key);
    }
}
