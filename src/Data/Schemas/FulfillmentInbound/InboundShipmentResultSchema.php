<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InboundShipmentResultSchema extends BaseSchema
{
    public function __construct(
        public string $shipment_id,
    ) {
    }
}
