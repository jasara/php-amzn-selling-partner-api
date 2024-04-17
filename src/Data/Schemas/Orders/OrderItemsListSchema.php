<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderItemsListSchema extends BaseSchema
{
    public function __construct(
        public OrderItemListSchema $order_items,
        public ?string $next_token,
        public string $amazon_order_id,
    ) {
    }
}
