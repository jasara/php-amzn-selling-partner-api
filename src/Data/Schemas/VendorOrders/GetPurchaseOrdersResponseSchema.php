<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetPurchaseOrdersResponseSchema extends BaseSchema
{
    public function __construct(
        public ?OrderListSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
