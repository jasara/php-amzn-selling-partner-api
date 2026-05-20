<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentTransactions20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransactionStatusSchema extends BaseSchema
{
    public function __construct(
        public ?TransactionSchema $transaction_status = null,
    ) {}
}
