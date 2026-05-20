<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class VendorDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?PartyIdentificationSchema $selling_party = null,
        public ?string $vendor_shipment_identifier = null,
    ) {}
}
