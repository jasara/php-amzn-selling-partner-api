<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentPayments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitInvoiceRequestSchema extends BaseSchema
{
    public function __construct(
        public ?array $invoices = null,
    ) {}
}
