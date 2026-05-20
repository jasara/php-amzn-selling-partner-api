<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DurationSchema extends BaseSchema
{
    public function __construct(
        public ?string $duration_unit = null,
        public ?int $duration_value = null,
    ) {}
}
