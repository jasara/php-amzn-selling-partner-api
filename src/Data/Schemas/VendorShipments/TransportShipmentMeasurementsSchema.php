<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportShipmentMeasurementsSchema extends BaseSchema
{
    public function __construct(
        public ?int $total_carton_count = null,
        public ?int $total_pallet_stackable = null,
        public ?int $total_pallet_non_stackable = null,
        public ?WeightSchema $shipment_weight = null,
        public ?VolumeSchema $shipment_volume = null,
    ) {}
}
