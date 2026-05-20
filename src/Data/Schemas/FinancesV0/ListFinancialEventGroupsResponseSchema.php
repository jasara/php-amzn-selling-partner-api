<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ListFinancialEventGroupsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ListFinancialEventGroupsPayloadSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
