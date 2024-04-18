<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrdersListSchema extends BaseSchema
{
    public function __construct(
        public OrderListSchema $orders,
        public ?string $next_token,
        public ?string $last_updated_before,
        public ?string $created_before,
    ) {
    }
}
