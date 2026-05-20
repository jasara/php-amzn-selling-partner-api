<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetOrdersResponseSchema extends BaseSchema
{
    public function __construct(
        public ?OrderListSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
