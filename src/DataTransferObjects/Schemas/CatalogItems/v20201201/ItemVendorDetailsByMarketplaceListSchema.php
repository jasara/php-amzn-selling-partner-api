<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20201201;

use Illuminate\Support\Collection;

class ItemVendorDetailsByMarketplaceListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ItemVendorDetailsByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
