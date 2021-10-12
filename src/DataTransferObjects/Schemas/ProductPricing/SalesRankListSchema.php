<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class SalesRankListSchema extends Collection
{
    public function offsetGet($key): SalesRankTypeSchema
    {
        return parent::offsetGet($key);
    }
}
