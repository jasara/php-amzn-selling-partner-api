<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $customer_order_number = null,
        public ?string $order_date = null,
        public ?string $order_status = null,
        public ?ShipmentDetailsSchema $shipment_details = null,
        public ?array $tax_total = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?AddressSchema $ship_to_party = null,
        public ?PartyIdentificationSchema $bill_to_party = null,
        public ?array $items = null,
    ) {}
}
