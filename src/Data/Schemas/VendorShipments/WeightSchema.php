<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class WeightSchema extends BaseSchema
{
    public function __construct(
        public ?string $unit_of_measure = null,
        public ?string $value = null,
    ) {}
}
