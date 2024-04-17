<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems;

class ItemSchema extends BaseSchema
{
    public function __construct(
        public string $asin,
        public ?array $attributes,

        public ?CatalogItems\ItemIdentifiersByMarketplaceListSchema $identifiers,

        public ?CatalogItems\ItemImagesByMarketplaceListSchema $images,

        public ?CatalogItems\ItemProductTypeByMarketplaceListSchema $product_types,

        public ?ItemSalesRanksByMarketplaceListSchema $sales_ranks,

        public ?ItemSummaryByMarketplaceListSchema $summaries,

        public ?CatalogItems\ItemVariationsByMarketplaceListSchema $variations,

        public ?ItemVendorDetailsByMarketplaceListSchema $vendor_details,
    ) {
    }
}
