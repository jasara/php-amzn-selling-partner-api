<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentTransactions;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetTransactionResponseSchema extends BaseSchema
{
    public function __construct(
        public ?TransactionStatusSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
