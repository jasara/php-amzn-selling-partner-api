<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20201201;

use Illuminate\Support\Collection;

class ItemSummaryByMarketplaceListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ItemSummaryByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
