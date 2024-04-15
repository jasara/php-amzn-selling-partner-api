<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class TransparencyCodeListSchema extends Collection
{
    public function offsetGet($key): string
    {
        return parent::offsetGet($key);
    }
}
