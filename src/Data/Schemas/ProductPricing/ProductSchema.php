<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ProductSchema extends BaseSchema
{
    public function __construct(
        public IdentifierTypeSchema $identifiers,
        public ?array $attribute_sets,
        public ?array $relationships,
        public ?CompetitivePricingTypeSchema $competitive_pricing,
        public ?SalesRankListSchema $sales_rankings,

        public ?OffersListSchema $offers,
    ) {
    }
}
