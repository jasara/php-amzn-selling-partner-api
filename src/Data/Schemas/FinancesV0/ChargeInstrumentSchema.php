<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ChargeInstrumentSchema extends BaseSchema
{
    public function __construct(
        public ?string $description = null,
        public ?string $tail = null,
        public ?CurrencySchema $amount = null,
    ) {}
}
