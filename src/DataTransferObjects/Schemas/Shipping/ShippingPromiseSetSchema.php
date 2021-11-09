<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Spatie\DataTransferObject\DataTransferObject;

class ShippingPromiseSetSchema extends DataTransferObject
{
    public ?TimeRangeSchema $delivery_window;

    public ?TimeRangeSchema $receive_window;
}
