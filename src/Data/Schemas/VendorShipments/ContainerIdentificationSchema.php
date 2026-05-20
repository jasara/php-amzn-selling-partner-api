<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContainerIdentificationSchema extends BaseSchema
{
    public function __construct(
        public ?string $container_identification_type = null,
        public ?string $container_identification_number = null,
    ) {}
}
