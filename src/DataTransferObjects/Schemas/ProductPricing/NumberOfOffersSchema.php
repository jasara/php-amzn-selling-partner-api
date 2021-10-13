<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class NumberOfOffersSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): OfferCountTypeSchema
    {
        return parent::offsetGet($key);
    }
}
