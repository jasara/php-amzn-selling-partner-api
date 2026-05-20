<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ChargeComponentSchema extends BaseSchema
{
    public function __construct(
        public ?string $charge_type = null,
        public ?CurrencySchema $charge_amount = null,
    ) {}
}
