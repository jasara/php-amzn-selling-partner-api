<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateShipmentStatusOrderItemSchema extends DataTransferObject
{
    public ?string $order_item_id;

    public ?int $quantity;
}
