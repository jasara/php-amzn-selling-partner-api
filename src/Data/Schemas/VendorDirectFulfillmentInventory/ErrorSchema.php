<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ErrorSchema extends BaseSchema
{
    public function __construct(
        public ?string $code = null,
        public ?string $message = null,
        public ?string $details = null,
    ) {}
}
