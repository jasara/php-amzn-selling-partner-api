<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LoanServicingEventSchema extends BaseSchema
{
    public function __construct(
        public ?CurrencySchema $loan_amount = null,
        public ?string $source_business_event_type = null,
    ) {}
}
