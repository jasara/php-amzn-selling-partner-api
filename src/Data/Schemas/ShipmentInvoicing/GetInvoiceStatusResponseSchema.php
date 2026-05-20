<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetInvoiceStatusResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ShipmentInvoiceStatusResponseSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
