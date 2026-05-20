<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxRegistrationDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $tax_registration_type = null,
        public ?string $tax_registration_number = null,
        public ?AddressSchema $tax_registration_address = null,
        public ?string $tax_registration_messages = null,
    ) {}
}
