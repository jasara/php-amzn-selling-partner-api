<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetShipmentsResultSchema extends BaseSchema
{
    public function __construct(
        public InboundShipmentListSchema $shipment_data,
        public ?string $next_token,
    ) {
    }
}
