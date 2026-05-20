<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ServiceLocationSchema extends BaseSchema
{
    public function __construct(
        public ?string $service_location_type = null,
        public ?AddressSchema $address = null,
    ) {}
}
