<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ListingsItemSchema extends BaseSchema
{
    public function __construct(
        public string $sku,

        public ?ItemSummaryListSchema $summaries,
        public ?array $attributes,

        public ?IssuesListSchema $issues,

        public ?ItemOfferListSchema $offers,

        public ?FulfillmentAvailabilityListSchema $fulfillment_availability,
        public ?ItemProcurementSchema $procurement,
    ) {
    }
}
