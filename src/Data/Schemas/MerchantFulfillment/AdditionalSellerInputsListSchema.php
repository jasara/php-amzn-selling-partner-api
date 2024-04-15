<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class AdditionalSellerInputsListSchema extends Collection
{
    public function offsetGet($key): AdditionalSellerInputsSchema
    {
        return parent::offsetGet($key);
    }
}
