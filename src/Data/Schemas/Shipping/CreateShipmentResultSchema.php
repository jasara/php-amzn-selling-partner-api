<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateShipmentResultSchema extends BaseSchema
{
    public function __construct(
        public string $shipment_id,

        public RateListSchema $eligible_rates,
    ) {
    }
}
