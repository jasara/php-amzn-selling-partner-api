<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AcknowledgementStatusSchema extends BaseSchema
{
    public function __construct(
        public ?string $code = null,
        public ?string $description = null,
    ) {}
}
