<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DebtRecoveryEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $debt_recovery_type = null,
        public ?CurrencySchema $recovery_amount = null,
        public ?CurrencySchema $over_payment_credit = null,
        public ?DebtRecoveryItemListSchema $debt_recovery_item_list = null,
        public ?ChargeInstrumentListSchema $charge_instrument_list = null,
    ) {}
}
