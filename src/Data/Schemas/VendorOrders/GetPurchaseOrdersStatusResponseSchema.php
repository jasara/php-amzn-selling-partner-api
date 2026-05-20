<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetPurchaseOrdersStatusResponseSchema extends BaseSchema
{
    public function __construct(
        public ?OrderListStatusSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
