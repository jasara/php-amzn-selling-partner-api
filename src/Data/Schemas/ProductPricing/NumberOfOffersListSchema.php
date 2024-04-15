<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class NumberOfOffersListSchema extends Collection
{
    public function offsetGet($key): OfferCountTypeSchema
    {
        return parent::offsetGet($key);
    }
}
