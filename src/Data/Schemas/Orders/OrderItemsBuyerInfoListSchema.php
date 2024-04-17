<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderItemsBuyerInfoListSchema extends BaseSchema
{
    public function __construct(
        public OrderItemBuyerInfoListSchema $order_items,
        public ?string $next_token,
        public string $amazon_order_id,
    ) {
    }
}
