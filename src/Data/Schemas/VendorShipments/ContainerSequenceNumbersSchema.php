<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContainerSequenceNumbersSchema extends BaseSchema
{
    public function __construct(
        public ?string $container_sequence_number = null,
    ) {}
}
