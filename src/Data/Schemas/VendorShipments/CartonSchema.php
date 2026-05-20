<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CartonSchema extends BaseSchema
{
    public function __construct(
        public ?array $carton_identifiers = null,
        public ?string $carton_sequence_number = null,
        public ?DimensionsSchema $dimensions = null,
        public ?WeightSchema $weight = null,
        public ?string $tracking_number = null,
        public ?array $items = null,
    ) {}
}
