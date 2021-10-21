<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class NumberOfOfferListingsListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): OfferListingCountTypeSchema
    {
        return parent::offsetGet($key);
    }
}
