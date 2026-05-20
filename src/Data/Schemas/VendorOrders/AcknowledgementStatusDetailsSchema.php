<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AcknowledgementStatusDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $acknowledgement_date = null,
        public ?ItemQuantitySchema $accepted_quantity = null,
        public ?ItemQuantitySchema $rejected_quantity = null,
    ) {}
}
