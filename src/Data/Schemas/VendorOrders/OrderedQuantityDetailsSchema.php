<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderedQuantityDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $updated_date = null,
        public ?ItemQuantitySchema $ordered_quantity = null,
        public ?ItemQuantitySchema $cancelled_quantity = null,
    ) {}
}
