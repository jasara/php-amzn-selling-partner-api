<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StopSchema extends BaseSchema
{
    public function __construct(
        public ?string $function_code = null,
        public ?LocationSchema $location_identification = null,
        public ?string $arrival_time = null,
        public ?string $departure_time = null,
    ) {}
}
