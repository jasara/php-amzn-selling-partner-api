<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentPayments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxRegistrationDetailSchema extends BaseSchema
{
    public function __construct(
        public ?string $tax_registration_type = null,
        public ?string $tax_registration_number = null,
        public ?AddressSchema $tax_registration_address = null,
        public ?string $tax_registration_message = null,
    ) {}
}
