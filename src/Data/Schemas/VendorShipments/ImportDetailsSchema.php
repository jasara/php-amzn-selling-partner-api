<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ImportDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $method_of_payment = null,
        public ?string $seal_number = null,
        public ?RouteSchema $route = null,
        public ?string $import_containers = null,
        public ?WeightSchema $billable_weight = null,
        public ?string $estimated_ship_by_date = null,
        public ?string $handling_instructions = null,
    ) {}
}
