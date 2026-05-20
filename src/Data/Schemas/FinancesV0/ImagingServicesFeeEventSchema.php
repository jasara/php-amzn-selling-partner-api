<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ImagingServicesFeeEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $imaging_request_billing_item_id = null,
        public ?string $asin = null,
        public ?string $posted_date = null,
        public ?FeeComponentListSchema $fee_list = null,
    ) {}
}
