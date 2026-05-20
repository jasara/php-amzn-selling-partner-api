<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FailedAdhocDisbursementEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $funds_transfers_type = null,
        public ?string $transfer_id = null,
        public ?string $disbursement_id = null,
        public ?string $payment_disbursement_type = null,
        public ?string $status = null,
        public ?CurrencySchema $transfer_amount = null,
        public ?string $posted_date = null,
    ) {}
}
