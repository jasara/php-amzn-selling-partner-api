<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class LowestPriceListSchema extends Collection
{
    public function offsetGet($key): LowestPriceTypeSchema
    {
        return parent::offsetGet($key);
    }
}
