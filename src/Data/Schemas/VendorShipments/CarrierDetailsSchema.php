<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CarrierDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $name = null,
        public ?string $code = null,
        public ?string $phone = null,
        public ?string $email = null,
        public ?string $shipment_reference_number = null,
    ) {}
}
