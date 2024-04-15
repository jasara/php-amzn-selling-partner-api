<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Illuminate\Support\Collection;

class MarketplaceTaxInfoListSchema extends Collection
{
    public function offsetGet($key): TaxClassificationSchema
    {
        return parent::offsetGet($key);
    }
}
