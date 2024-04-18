<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems;

class ItemSalesRanksByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,

        public CatalogItems\ItemSalesRankListSchema $ranks,
    ) {
    }
}
