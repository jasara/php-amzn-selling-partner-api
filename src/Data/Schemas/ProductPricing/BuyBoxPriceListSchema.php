<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class BuyBoxPriceListSchema extends Collection
{
    public function offsetGet($key): BuyBoxPriceTypeSchema
    {
        return parent::offsetGet($key);
    }
}
