<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContainersSchema extends BaseSchema
{
    public function __construct(
        public ?string $container_type = null,
        public ?string $container_sequence_number = null,
        public ?array $container_identifiers = null,
        public ?string $tracking_number = null,
        public ?DimensionsSchema $dimensions = null,
        public ?WeightSchema $weight = null,
        public ?int $tier = null,
        public ?int $block = null,
        public ?InnerContainersDetailsSchema $inner_containers_details = null,
        public ?array $packed_items = null,
    ) {}
}
