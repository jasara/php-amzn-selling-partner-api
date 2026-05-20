<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorTransactionStatus;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransactionStatusSchema extends BaseSchema
{
    public function __construct(
        public ?TransactionSchema $transaction_status = null,
    ) {}
}
