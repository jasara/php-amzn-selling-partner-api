<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class ItemLevelFieldsListSchema extends Collection
{
    public function offsetGet($key): ItemLevelFieldsSchema
    {
        return parent::offsetGet($key);
    }
}
