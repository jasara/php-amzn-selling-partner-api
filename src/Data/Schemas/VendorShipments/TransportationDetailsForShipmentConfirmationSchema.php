<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportationDetailsForShipmentConfirmationSchema extends BaseSchema
{
    public function __construct(
        public ?string $carrier_scac = null,
        public ?string $carrier_shipment_reference_number = null,
        public ?string $transportation_mode = null,
        public ?string $bill_of_lading_number = null,
    ) {}
}
