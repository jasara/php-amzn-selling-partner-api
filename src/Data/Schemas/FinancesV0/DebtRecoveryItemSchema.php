<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DebtRecoveryItemSchema extends BaseSchema
{
    public function __construct(
        public ?CurrencySchema $recovery_amount = null,
        public ?CurrencySchema $original_amount = null,
        public ?string $group_begin_date = null,
        public ?string $group_end_date = null,
    ) {}
}
