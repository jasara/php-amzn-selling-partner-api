<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?string $purchase_order_state = null,
        public ?OrderDetailsSchema $order_details = null,
    ) {}
}
