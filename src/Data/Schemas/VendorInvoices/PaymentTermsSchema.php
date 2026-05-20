<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorInvoices;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PaymentTermsSchema extends BaseSchema
{
    public function __construct(
        public ?string $type = null,
        public ?string $discount_percent = null,
        public ?float $discount_due_days = null,
        public ?float $net_due_days = null,
    ) {}
}
