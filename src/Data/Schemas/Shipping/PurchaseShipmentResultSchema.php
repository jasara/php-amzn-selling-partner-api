<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PurchaseShipmentResultSchema extends BaseSchema
{
    public function __construct(
        public string $shipment_id,
        public ServiceRateSchema $service_rate,

        public LabelResultListSchema $label_results,
    ) {
    }
}
