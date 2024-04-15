<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class PriceListSchema extends Collection
{
    public function offsetGet($key): PriceSchema
    {
        return parent::offsetGet($key);
    }
}
