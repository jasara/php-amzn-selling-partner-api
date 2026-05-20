<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AffordabilityExpenseEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $amazon_order_id = null,
        public ?string $posted_date = null,
        public ?string $marketplace_id = null,
        public ?string $transaction_type = null,
        public ?CurrencySchema $base_expense = null,
        public ?CurrencySchema $tax_type_cgst = null,
        public ?CurrencySchema $tax_type_sgst = null,
        public ?CurrencySchema $tax_type_igst = null,
        public ?CurrencySchema $total_expense = null,
    ) {}
}
