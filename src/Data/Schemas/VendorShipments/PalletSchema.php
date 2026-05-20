<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PalletSchema extends BaseSchema
{
    public function __construct(
        public ?array $pallet_identifiers = null,
        public ?int $tier = null,
        public ?int $block = null,
        public ?DimensionsSchema $dimensions = null,
        public ?WeightSchema $weight = null,
        public ?CartonReferenceDetailsSchema $carton_reference_details = null,
        public ?array $items = null,
    ) {}
}
