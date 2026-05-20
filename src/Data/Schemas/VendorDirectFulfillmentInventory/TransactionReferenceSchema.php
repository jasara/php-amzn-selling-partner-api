<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransactionReferenceSchema extends BaseSchema
{
    public function __construct(
        public ?string $transaction_id = null,
    ) {}
}
