<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AddressSchema extends BaseSchema
{
    public function __construct(
        public ?string $name = null,
        public ?string $address_line1 = null,
        public ?string $address_line2 = null,
        public ?string $address_line3 = null,
        public ?string $city = null,
        public ?string $county = null,
        public ?string $district = null,
        public ?string $state_or_region = null,
        public ?string $postal_code = null,
        public ?string $country_code = null,
        public ?string $phone = null,
    ) {}
}
