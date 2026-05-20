<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ImportDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $method_of_payment = null,
        public ?string $international_commercial_terms = null,
        public ?string $port_of_delivery = null,
        public ?string $import_containers = null,
        public ?string $shipping_instructions = null,
    ) {}
}
