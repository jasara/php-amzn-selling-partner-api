<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentTransactions20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransactionSchema extends BaseSchema
{
    public function __construct(
        public ?string $transaction_id = null,
        public ?string $status = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
