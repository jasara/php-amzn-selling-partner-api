<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class NetworkComminglingTransactionEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $transaction_type = null,
        public ?string $posted_date = null,
        public ?string $net_co_transaction_id = null,
        public ?string $swap_reason = null,
        public ?string $asin = null,
        public ?string $marketplace_id = null,
        public ?CurrencySchema $tax_exclusive_amount = null,
        public ?CurrencySchema $tax_amount = null,
    ) {}
}
