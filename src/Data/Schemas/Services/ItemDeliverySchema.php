<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemDeliverySchema extends BaseSchema
{
    public function __construct(
        public ?string $estimated_delivery_date = null,
        public ?ItemDeliveryPromiseSchema $item_delivery_promise = null,
    ) {}
}
