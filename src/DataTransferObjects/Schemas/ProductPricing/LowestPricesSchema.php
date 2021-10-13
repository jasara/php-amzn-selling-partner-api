<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Illuminate\Support\Collection;

class LowestPricesSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): LowestPriceTypeSchema
    {
        return parent::offsetGet($key);
    }
}
