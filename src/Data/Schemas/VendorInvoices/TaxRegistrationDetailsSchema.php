<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorInvoices;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxRegistrationDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $tax_registration_type = null,
        public ?string $tax_registration_number = null,
    ) {}
}
