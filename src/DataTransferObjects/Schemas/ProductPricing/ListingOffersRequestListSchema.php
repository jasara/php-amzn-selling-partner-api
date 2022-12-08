<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class ListingOffersRequestListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ListingOffersRequestSchema
    {
        return parent::offsetGet($key);
    }
}
