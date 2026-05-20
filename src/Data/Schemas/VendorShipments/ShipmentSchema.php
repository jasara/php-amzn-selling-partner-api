<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentSchema extends BaseSchema
{
    public function __construct(
        public ?string $vendor_shipment_identifier = null,
        public ?string $transaction_type = null,
        public ?string $buyer_reference_number = null,
        public ?string $transaction_date = null,
        public ?string $current_shipment_status = null,
        public ?string $currentshipment_status_date = null,
        public ?array $shipment_status_details = null,
        public ?string $shipment_create_date = null,
        public ?string $shipment_confirm_date = null,
        public ?string $package_label_create_date = null,
        public ?string $shipment_freight_term = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?PartyIdentificationSchema $ship_to_party = null,
        public ?TransportShipmentMeasurementsSchema $shipment_measurements = null,
        public ?CollectFreightPickupDetailsSchema $collect_freight_pickup_details = null,
        public ?array $purchase_orders = null,
        public ?ImportDetailsSchema $import_details = null,
        public ?array $containers = null,
        public ?TransportationDetailsSchema $transportation_details = null,
    ) {}
}
