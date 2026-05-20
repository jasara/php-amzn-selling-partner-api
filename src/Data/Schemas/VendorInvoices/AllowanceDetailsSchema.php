<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorInvoices;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AllowanceDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $type = null,
        public ?string $description = null,
        public ?MoneySchema $allowance_amount = null,
        public ?array $tax_details = null,
    ) {}
}
