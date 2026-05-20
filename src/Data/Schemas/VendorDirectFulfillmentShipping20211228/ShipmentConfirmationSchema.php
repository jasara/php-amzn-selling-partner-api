<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentConfirmationSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?ShipmentDetailsSchema $shipment_details = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?array $items = null,
        public ?array $containers = null,
    ) {}
}
