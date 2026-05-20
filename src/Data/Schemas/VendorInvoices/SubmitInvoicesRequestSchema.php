<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorInvoices;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitInvoicesRequestSchema extends BaseSchema
{
    public function __construct(
        public ?array $invoices = null,
    ) {}
}
