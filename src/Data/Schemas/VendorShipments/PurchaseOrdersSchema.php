<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PurchaseOrdersSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?string $purchase_order_date = null,
        public ?string $ship_window = null,
        public ?array $items = null,
    ) {}
}
