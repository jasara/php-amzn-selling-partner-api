<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitShippingLabelsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?TransactionReferenceSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
