<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class AvailableDeliveryExperienceOptionsListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): AvailableDeliveryExperienceOptionSchema
    {
        return parent::offsetGet($key);
    }
}
