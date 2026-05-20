<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransactionReferenceSchema extends BaseSchema
{
    public function __construct(
        public ?string $transaction_id = null,
    ) {}
}
