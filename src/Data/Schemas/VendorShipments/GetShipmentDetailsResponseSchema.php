<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetShipmentDetailsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ShipmentDetailsSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
