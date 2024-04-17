<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ScheduledDeliveryInfoSchema extends BaseSchema
{
    public function __construct(
        public string $delivery_time_zone,

        public DeliveryWindowListSchema $delivery_windows,
    ) {
    }
}
