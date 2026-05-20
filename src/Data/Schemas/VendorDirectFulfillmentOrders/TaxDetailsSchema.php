<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $tax_rate = null,
        public ?MoneySchema $tax_amount = null,
        public ?MoneySchema $taxable_amount = null,
        public ?string $type = null,
    ) {}
}
