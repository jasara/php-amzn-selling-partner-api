<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContainerSchema extends BaseSchema
{
    public function __construct(
        public ?string $container_type = null,
        public ?string $container_identifier = null,
        public ?string $tracking_number = null,
        public ?string $manifest_id = null,
        public ?string $manifest_date = null,
        public ?string $ship_method = null,
        public ?string $scac_code = null,
        public ?string $carrier = null,
        public ?int $container_sequence_number = null,
        public ?DimensionsSchema $dimensions = null,
        public ?WeightSchema $weight = null,
        public ?array $packed_items = null,
    ) {}
}
