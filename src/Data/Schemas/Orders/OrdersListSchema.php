<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class OrdersListSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: OrderSchema::class)]
    public OrderListSchema $orders;

    public ?string $next_token;

    public ?string $last_updated_before;

    public ?string $created_before;
}
