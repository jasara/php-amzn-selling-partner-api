<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateShipmentStatusOrderItemSchema extends DataTransferObject
{
    public ?string $order_item_id;

    public ?int $quantity;
}
