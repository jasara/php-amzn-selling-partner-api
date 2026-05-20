<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $item_sequence_number = null,
        public ?string $amazon_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?ItemQuantitySchema $ordered_quantity = null,
        public ?bool $is_back_order_allowed = null,
        public ?MoneySchema $net_cost = null,
        public ?MoneySchema $list_price = null,
    ) {}
}
