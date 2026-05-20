<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GiftDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $gift_message = null,
        public ?string $gift_wrap_id = null,
    ) {}
}
