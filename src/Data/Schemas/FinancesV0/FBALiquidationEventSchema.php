<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FBALiquidationEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?string $original_removal_order_id = null,
        public ?CurrencySchema $liquidation_proceeds_amount = null,
        public ?CurrencySchema $liquidation_fee_amount = null,
    ) {}
}
