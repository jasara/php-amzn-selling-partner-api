<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class BuyBoxEligibleOfferListSchema extends Collection
{
    public function offsetGet($key): OfferCountTypeSchema
    {
        return parent::offsetGet($key);
    }
}
