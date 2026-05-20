<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentTransactions20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ErrorSchema extends BaseSchema
{
    public function __construct(
        public ?string $code = null,
        public ?string $message = null,
        public ?string $details = null,
    ) {}
}
