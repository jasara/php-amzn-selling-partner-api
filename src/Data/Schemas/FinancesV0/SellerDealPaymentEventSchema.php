<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SellerDealPaymentEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?string $deal_id = null,
        public ?string $deal_description = null,
        public ?string $event_type = null,
        public ?string $fee_type = null,
        public ?CurrencySchema $fee_amount = null,
        public ?CurrencySchema $tax_amount = null,
        public ?CurrencySchema $total_amount = null,
    ) {}
}
