<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderStatusSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?string $purchase_order_status = null,
        public ?string $purchase_order_date = null,
        public ?string $last_updated_date = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?PartyIdentificationSchema $ship_to_party = null,
        public ?ItemStatusSchema $item_status = null,
    ) {}
}
