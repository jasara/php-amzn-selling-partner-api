<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentPayments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxDetailSchema extends BaseSchema
{
    public function __construct(
        public ?string $tax_type = null,
        public ?string $tax_rate = null,
        public ?MoneySchema $tax_amount = null,
        public ?MoneySchema $taxable_amount = null,
    ) {}
}
