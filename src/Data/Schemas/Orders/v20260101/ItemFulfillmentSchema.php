<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class ItemFulfillmentSchema extends BaseSchema
{
    public function __construct(
        public ?int $quantity_fulfilled,
        public ?int $quantity_unfulfilled,
        public ?ItemPackingSchema $packing,
        public ?ItemPickingSchema $picking,
        public ?ItemShippingSchema $shipping,
    ) {
    }
}
