<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class AdditionalSellerInputsListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key):  AdditionalSellerInputsSchema
    {
        return parent::offsetGet($key);
    }
}
