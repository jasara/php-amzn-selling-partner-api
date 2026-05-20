<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitAcknowledgementResponseSchema extends BaseSchema
{
    public function __construct(
        public ?TransactionIdSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
