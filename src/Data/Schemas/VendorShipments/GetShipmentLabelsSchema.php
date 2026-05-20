<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetShipmentLabelsSchema extends BaseSchema
{
    public function __construct(
        public ?TransportationLabelsSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
