<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportationDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $ship_mode = null,
        public ?string $transportation_mode = null,
        public ?string $shipped_date = null,
        public ?string $estimated_delivery_date = null,
        public ?string $shipment_delivery_date = null,
        public ?CarrierDetailsSchema $carrier_details = null,
        public ?string $bill_of_lading_number = null,
    ) {}
}
