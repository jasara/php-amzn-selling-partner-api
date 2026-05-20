<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransactionIdSchema extends BaseSchema
{
    public function __construct(
        public ?string $transaction_id = null,
    ) {}
}
