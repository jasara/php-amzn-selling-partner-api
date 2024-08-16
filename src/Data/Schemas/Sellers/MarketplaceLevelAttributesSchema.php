<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MarketplaceLevelAttributesSchema extends BaseSchema
{
    public function __construct(
        public MarketplaceSchema $marketplace,
        public string $store_name,
        public ListingStatus $listing_status,
        public SellingPlan $selling_plan,
    ) {
    }
}
