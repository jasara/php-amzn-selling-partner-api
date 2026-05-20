<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderItemAcknowledgementSchema extends BaseSchema
{
    public function __construct(
        public ?string $acknowledgement_code = null,
        public ?ItemQuantitySchema $acknowledged_quantity = null,
        public ?string $scheduled_ship_date = null,
        public ?string $scheduled_delivery_date = null,
        public ?string $rejection_reason = null,
    ) {}
}
