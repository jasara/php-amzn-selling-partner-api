<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class ListingOffersResponseListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ListingOffersResponseSchema
    {
        return parent::offsetGet($key);
    }
}
