<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ChargeRefundEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?string $reason_code = null,
        public ?string $reason_code_description = null,
        public ?ChargeRefundTransactionsSchema $charge_refund_transactions = null,
    ) {}
}
