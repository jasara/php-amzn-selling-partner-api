<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class OrderItemsListSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: OrderItemSchema::class)]
    public OrderItemListSchema $order_items;

    public ?string $next_token;

    public string $amazon_order_id;
}
