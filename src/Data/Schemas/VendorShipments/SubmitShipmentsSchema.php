<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitShipmentsSchema extends BaseSchema
{
    public function __construct(
        public ?array $shipments = null,
    ) {}
}
