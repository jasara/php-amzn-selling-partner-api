<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentConfirmationSchema extends BaseSchema
{
    public function __construct(
        public ?string $shipment_identifier = null,
        public ?string $shipment_confirmation_type = null,
        public ?string $shipment_type = null,
        public ?string $shipment_structure = null,
        public ?TransportationDetailsForShipmentConfirmationSchema $transportation_details = null,
        public ?string $amazon_reference_number = null,
        public ?string $shipment_confirmation_date = null,
        public ?string $shipped_date = null,
        public ?string $estimated_delivery_date = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?PartyIdentificationSchema $ship_to_party = null,
        public ?ShipmentMeasurementsSchema $shipment_measurements = null,
        public ?ImportDetailsSchema $import_details = null,
        public ?array $shipped_items = null,
        public ?array $cartons = null,
        public ?array $pallets = null,
    ) {}
}
