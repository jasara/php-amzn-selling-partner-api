<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class OfferDetailListSchema extends Collection
{
    public function offsetGet($key): OfferDetailSchema
    {
        return parent::offsetGet($key);
    }
}
