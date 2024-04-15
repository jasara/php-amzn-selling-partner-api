<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class ItemListSchema extends Collection
{
    public function offsetGet($key): ItemSchema
    {
        return parent::offsetGet($key);
    }
}
