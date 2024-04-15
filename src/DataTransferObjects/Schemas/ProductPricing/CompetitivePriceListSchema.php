<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class CompetitivePriceListSchema extends Collection
{
    public function offsetGet($key): CompetitivePriceTypeSchema
    {
        return parent::offsetGet($key);
    }
}
