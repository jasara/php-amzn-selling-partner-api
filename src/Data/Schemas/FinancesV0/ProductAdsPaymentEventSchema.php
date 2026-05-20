<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ProductAdsPaymentEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?string $transaction_type = null,
        public ?string $invoice_id = null,
        public ?CurrencySchema $base_value = null,
        public ?CurrencySchema $tax_value = null,
        public ?CurrencySchema $transaction_value = null,
    ) {}
}
