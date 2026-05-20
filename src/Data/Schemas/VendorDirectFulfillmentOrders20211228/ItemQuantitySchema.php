<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemQuantitySchema extends BaseSchema
{
    public function __construct(
        public ?int $amount = null,
        public ?string $unit_of_measure = null,
    ) {}
}
