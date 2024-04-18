<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class UpdateShipmentStatusOrderItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $order_item_id,
        public ?int $quantity,
    ) {
    }
}
