<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentMeasurementsSchema extends BaseSchema
{
    public function __construct(
        public ?WeightSchema $gross_shipment_weight = null,
        public ?VolumeSchema $shipment_volume = null,
        public ?int $carton_count = null,
        public ?int $pallet_count = null,
    ) {}
}
