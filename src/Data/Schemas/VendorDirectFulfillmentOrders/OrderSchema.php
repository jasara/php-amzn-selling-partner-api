<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?OrderDetailsSchema $order_details = null,
    ) {}
}
