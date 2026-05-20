<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorInvoices;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitInvoicesResponseSchema extends BaseSchema
{
    public function __construct(
        public ?TransactionIdSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
