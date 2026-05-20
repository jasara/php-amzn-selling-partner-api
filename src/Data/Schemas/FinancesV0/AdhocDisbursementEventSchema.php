<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AdhocDisbursementEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $transaction_type = null,
        public ?string $posted_date = null,
        public ?string $transaction_id = null,
        public ?CurrencySchema $transaction_amount = null,
    ) {}
}
