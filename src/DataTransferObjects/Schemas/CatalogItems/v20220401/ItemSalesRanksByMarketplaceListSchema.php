<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20220401;

use Illuminate\Support\Collection;

class ItemSalesRanksByMarketplaceListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ItemSalesRanksByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
