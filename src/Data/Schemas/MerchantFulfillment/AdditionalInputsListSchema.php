<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class AdditionalInputsListSchema extends Collection
{
    public function offsetGet($key): AdditionalInputsSchema
    {
        return parent::offsetGet($key);
    }
}
