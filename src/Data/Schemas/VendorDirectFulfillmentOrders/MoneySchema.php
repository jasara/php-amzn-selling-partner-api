<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MoneySchema extends BaseSchema
{
    public function __construct(
        public ?string $currency_code = null,
        public ?string $amount = null,
    ) {}
}
