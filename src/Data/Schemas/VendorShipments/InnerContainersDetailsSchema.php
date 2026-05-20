<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InnerContainersDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?int $container_count = null,
        public ?array $container_sequence_numbers = null,
    ) {}
}
