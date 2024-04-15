<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class ItemOfferListSchema extends Collection
{
    public function offsetGet($key): ItemOfferByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
