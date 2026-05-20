<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AdjustmentEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $adjustment_type = null,
        public ?string $posted_date = null,
        public ?string $store_name = null,
        public ?CurrencySchema $adjustment_amount = null,
        public ?AdjustmentItemListSchema $adjustment_item_list = null,
    ) {}
}
