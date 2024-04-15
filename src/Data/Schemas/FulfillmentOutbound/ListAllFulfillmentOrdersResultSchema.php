<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ListAllFulfillmentOrdersResultSchema extends DataTransferObject
{
    public ?string $next_token;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentOrderSchema::class)]
    public ?FulfillmentOrderListSchema $fulfillment_orders;
}
