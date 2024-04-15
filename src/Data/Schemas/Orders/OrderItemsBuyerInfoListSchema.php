<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class OrderItemsBuyerInfoListSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: OrderItemBuyerInfoSchema::class)]
    public OrderItemBuyerInfoListSchema $order_items;

    public ?string $next_token;

    public string $amazon_order_id;
}
