<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MoneySchema extends BaseSchema
{
    public function __construct(
        public ?string $currency_code = null,
        public ?string $amount = null,
        public ?string $unit_of_measure = null,
    ) {}
}
