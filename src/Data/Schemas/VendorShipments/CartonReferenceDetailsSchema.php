<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CartonReferenceDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?int $carton_count = null,
        public ?array $carton_reference_numbers = null,
    ) {}
}
