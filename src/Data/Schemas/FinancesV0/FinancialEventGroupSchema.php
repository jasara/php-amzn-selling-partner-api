<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FinancialEventGroupSchema extends BaseSchema
{
    public function __construct(
        public ?string $financial_event_group_id = null,
        public ?string $processing_status = null,
        public ?string $fund_transfer_status = null,
        public ?CurrencySchema $original_total = null,
        public ?CurrencySchema $converted_total = null,
        public ?string $fund_transfer_date = null,
        public ?string $trace_id = null,
        public ?string $account_tail = null,
        public ?CurrencySchema $beginning_balance = null,
        public ?string $financial_event_group_start = null,
        public ?string $financial_event_group_end = null,
    ) {}
}
