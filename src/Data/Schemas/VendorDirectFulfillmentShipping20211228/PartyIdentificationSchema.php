<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PartyIdentificationSchema extends BaseSchema
{
    public function __construct(
        public ?string $party_id = null,
        public ?AddressSchema $address = null,
        public ?array $tax_registration_details = null,
    ) {}
}
