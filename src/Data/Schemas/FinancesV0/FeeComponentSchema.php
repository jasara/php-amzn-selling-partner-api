<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeeComponentSchema extends BaseSchema
{
    public function __construct(
        public ?string $fee_type = null,
        public ?CurrencySchema $fee_amount = null,
    ) {}
}
