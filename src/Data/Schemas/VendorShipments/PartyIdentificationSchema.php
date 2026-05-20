<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PartyIdentificationSchema extends BaseSchema
{
    public function __construct(
        public ?AddressSchema $address = null,
        public ?string $party_id = null,
        public ?array $tax_registration_details = null,
    ) {}
}
