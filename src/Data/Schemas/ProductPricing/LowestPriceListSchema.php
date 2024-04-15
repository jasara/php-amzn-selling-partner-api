<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class LowestPriceListSchema extends Collection
{
    public function offsetGet($key): LowestPriceTypeSchema
    {
        return parent::offsetGet($key);
    }
}
