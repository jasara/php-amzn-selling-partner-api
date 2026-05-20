<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxWithholdingPeriodSchema extends BaseSchema
{
    public function __construct(
        public ?string $start_date = null,
        public ?string $end_date = null,
    ) {}
}
