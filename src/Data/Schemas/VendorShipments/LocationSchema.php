<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LocationSchema extends BaseSchema
{
    public function __construct(
        public ?string $type = null,
        public ?string $location_code = null,
        public ?string $country_code = null,
    ) {}
}
