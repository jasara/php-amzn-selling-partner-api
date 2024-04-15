<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ScheduledDeliveryInfoSchema extends DataTransferObject
{
    public string $delivery_time_zone;

    #[CastWith(ArrayCaster::class, itemType: DeliveryWindowSchema::class)]
    public DeliveryWindowListSchema $delivery_windows;
}
