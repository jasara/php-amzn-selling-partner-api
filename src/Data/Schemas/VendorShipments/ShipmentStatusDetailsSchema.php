<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentStatusDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $shipment_status = null,
        public ?string $shipment_status_date = null,
    ) {}
}
