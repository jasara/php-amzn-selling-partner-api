<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ListFinancialEventsPayloadSchema extends BaseSchema
{
    public function __construct(
        public ?string $next_token = null,
        public ?FinancialEventsSchema $financial_events = null,
    ) {}
}
