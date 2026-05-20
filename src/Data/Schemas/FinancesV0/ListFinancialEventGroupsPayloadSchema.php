<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ListFinancialEventGroupsPayloadSchema extends BaseSchema
{
    public function __construct(
        public ?string $next_token = null,
        public ?FinancialEventGroupListSchema $financial_event_group_list = null,
    ) {}
}
