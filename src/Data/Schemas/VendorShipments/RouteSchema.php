<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RouteSchema extends BaseSchema
{
    public function __construct(
        public ?array $stops = null,
    ) {}
}
