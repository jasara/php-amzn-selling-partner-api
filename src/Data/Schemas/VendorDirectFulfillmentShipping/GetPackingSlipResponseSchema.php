<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetPackingSlipResponseSchema extends BaseSchema
{
    public function __construct(
        public ?PackingSlipSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
