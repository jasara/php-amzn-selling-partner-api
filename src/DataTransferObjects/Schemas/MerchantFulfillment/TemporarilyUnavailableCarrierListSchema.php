<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class TemporarilyUnavailableCarrierListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): TemporarilyUnavailableCarrierSchema
    {
        return parent::offsetGet($key);
    }
}
