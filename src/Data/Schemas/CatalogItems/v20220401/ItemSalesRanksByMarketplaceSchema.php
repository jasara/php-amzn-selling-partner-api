<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems;

class ItemSalesRanksByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,

        public ?CatalogItems\ItemClassificationSalesRankListSchema $classification_ranks,

        public ?CatalogItems\ItemDisplayGroupSalesRankListSchema $display_group_ranks,
    ) {
    }
}
