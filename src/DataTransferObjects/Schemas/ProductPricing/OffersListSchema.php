<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class OffersListSchema extends Collection
{
    public function offsetGet($key): OfferSchema
    {
        return parent::offsetGet($key);
    }
}
