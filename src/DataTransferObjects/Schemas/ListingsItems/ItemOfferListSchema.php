<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class ItemOfferListSchema extends Collection
{
    public function offsetGet($key): ItemOfferByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
