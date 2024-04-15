<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class NumberOfOfferListingsListSchema extends Collection
{
    public function offsetGet($key): OfferListingCountTypeSchema
    {
        return parent::offsetGet($key);
    }
}
