<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ListingsItemSchema extends BaseSchema
{
    public function __construct(
        public string $sku,

        public ?ItemSummaryListSchema $summaries = null,
        public ?array $attributes = null,

        public ?IssuesListSchema $issues = null,

        public ?ItemOfferListSchema $offers = null,

        public ?FulfillmentAvailabilityListSchema $fulfillment_availability = null,
        public ?ItemProcurementSchema $procurement = null,
        public ?array $relationships = null,
        public ?array $product_types = null,
    ) {
    }
}
