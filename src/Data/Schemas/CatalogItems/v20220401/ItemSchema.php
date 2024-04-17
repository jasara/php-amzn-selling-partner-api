<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems;

class ItemSchema extends BaseSchema
{
    public function __construct(
        public string $asin,
        public ?array $attributes,

        public ?CatalogItems\ItemDimensionsByMarketplaceListSchema $dimensions,

        public ?CatalogItems\ItemIdentifiersByMarketplaceListSchema $identifiers,

        public ?CatalogItems\ItemImagesByMarketplaceListSchema $images,

        public ?CatalogItems\ItemProductTypeByMarketplaceListSchema $product_types,

        public ?CatalogItems\ItemRelationshipsByMarketplaceListSchema $relationships,

        public ?ItemSalesRanksByMarketplaceListSchema $sales_ranks,

        public ?ItemSummaryByMarketplaceListSchema $summaries,

        public ?ItemVendorDetailsByMarketplaceListSchema $vendor_details,
    ) {
    }
}
