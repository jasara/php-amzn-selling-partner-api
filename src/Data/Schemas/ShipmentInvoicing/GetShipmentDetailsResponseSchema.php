<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetShipmentDetailsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ShipmentDetailSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
