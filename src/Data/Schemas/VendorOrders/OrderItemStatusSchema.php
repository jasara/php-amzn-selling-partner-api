<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderItemStatusSchema extends BaseSchema
{
    public function __construct(
        public ?string $item_sequence_number = null,
        public ?string $buyer_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?MoneySchema $net_cost = null,
        public ?MoneySchema $list_price = null,
        public ?array $ordered_quantity = null,
        public ?array $acknowledgement_status = null,
        public ?array $receiving_status = null,
    ) {}
}
