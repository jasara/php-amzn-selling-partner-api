<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PaginationSchema extends BaseSchema
{
    public function __construct(
        public ?string $next_token = null,
    ) {}
}
