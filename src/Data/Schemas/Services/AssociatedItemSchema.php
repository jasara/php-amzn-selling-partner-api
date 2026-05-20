<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AssociatedItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $asin = null,
        public ?string $title = null,
        public ?int $quantity = null,
        public ?string $order_id = null,
        public ?string $item_status = null,
        public ?string $brand_name = null,
        public ?ItemDeliverySchema $item_delivery = null,
    ) {}
}
