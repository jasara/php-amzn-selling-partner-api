<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CurrencySchema extends BaseSchema
{
    public function __construct(
        public ?string $currency_code = null,
        public ?float $currency_amount = null,
    ) {}
}
