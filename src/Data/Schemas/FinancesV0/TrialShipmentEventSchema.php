<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TrialShipmentEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $amazon_order_id = null,
        public ?string $financial_event_group_id = null,
        public ?string $posted_date = null,
        public ?string $sku = null,
        public ?FeeComponentListSchema $fee_list = null,
    ) {}
}
