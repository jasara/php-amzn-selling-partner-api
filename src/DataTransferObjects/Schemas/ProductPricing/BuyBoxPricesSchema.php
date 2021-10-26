<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class BuyBoxPricesSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): BuyBoxPriceTypeSchema
    {
        return parent::offsetGet($key);
    }
}
