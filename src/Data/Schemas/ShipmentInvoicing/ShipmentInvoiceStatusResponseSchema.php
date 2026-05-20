<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentInvoiceStatusResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ShipmentInvoiceStatusInfoSchema $shipments = null,
    ) {}
}
