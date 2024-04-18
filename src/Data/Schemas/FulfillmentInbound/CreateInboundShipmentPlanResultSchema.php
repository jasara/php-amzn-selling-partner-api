<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateInboundShipmentPlanResultSchema extends BaseSchema
{
    public function __construct(
        public ?InboundShipmentPlanListSchema $inbound_shipment_plans,
    ) {
    }
}
