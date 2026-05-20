<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentInformationSchema extends BaseSchema
{
    public function __construct(
        public ?VendorDetailsSchema $vendor_details = null,
        public ?string $buyer_reference_number = null,
        public ?PartyIdentificationSchema $ship_to_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?string $warehouse_id = null,
        public ?string $master_tracking_id = null,
        public ?int $total_label_count = null,
        public ?string $ship_mode = null,
    ) {}
}
