<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_date = null,
        public ?string $purchase_order_changed_date = null,
        public ?string $purchase_order_state_changed_date = null,
        public ?string $purchase_order_type = null,
        public ?ImportDetailsSchema $import_details = null,
        public ?string $deal_code = null,
        public ?string $payment_method = null,
        public ?PartyIdentificationSchema $buying_party = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?PartyIdentificationSchema $ship_to_party = null,
        public ?PartyIdentificationSchema $bill_to_party = null,
        public ?string $ship_window = null,
        public ?string $delivery_window = null,
        public ?array $items = null,
    ) {}
}
