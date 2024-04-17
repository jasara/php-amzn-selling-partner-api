<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InboundShipmentPlanItemSchema extends BaseSchema
{
    public function __construct(
        public string $seller_sku,
        public string $fulfillment_network_sku,
        public int $quantity,

        public ?PrepDetailsListSchema $prep_details_list,
    ) {
    }
}
