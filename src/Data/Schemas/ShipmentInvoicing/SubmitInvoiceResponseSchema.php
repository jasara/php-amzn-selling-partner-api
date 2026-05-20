<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitInvoiceResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ErrorListSchema $errors = null,
    ) {}
}
