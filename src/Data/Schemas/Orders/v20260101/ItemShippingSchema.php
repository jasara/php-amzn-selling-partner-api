<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class ItemShippingSchema extends BaseSchema
{
    public function __construct(
        public ?DateTimeRangeSchema $scheduled_delivery_window,
        public ?ShippingConstraintsSchema $shipping_constraints,
        public ?InternationalShippingSchema $international_shipping,
    ) {
    }
}
