<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class MarketplaceTaxInfoSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): TaxClassificationSchema
    {
        return parent::offsetGet($key);
    }
}
