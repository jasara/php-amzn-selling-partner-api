<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderListSchema extends BaseSchema
{
    public function __construct(
        public ?PaginationSchema $pagination = null,
        public ?array $orders = null,
    ) {}
}
