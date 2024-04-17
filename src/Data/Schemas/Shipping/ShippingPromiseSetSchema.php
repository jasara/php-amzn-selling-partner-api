<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShippingPromiseSetSchema extends BaseSchema
{
    public function __construct(
        public ?TimeRangeSchema $delivery_window,
        public ?TimeRangeSchema $receive_window,
    ) {
    }
}
