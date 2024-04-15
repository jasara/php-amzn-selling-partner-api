<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class TaxClassificationListSchema extends Collection
{
    public function offsetGet($key): TaxClassificationSchema
    {
        return parent::offsetGet($key);
    }
}
