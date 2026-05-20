<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxWithholdingEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?CurrencySchema $base_amount = null,
        public ?CurrencySchema $withheld_amount = null,
        public ?TaxWithholdingPeriodSchema $tax_withholding_period = null,
    ) {}
}
