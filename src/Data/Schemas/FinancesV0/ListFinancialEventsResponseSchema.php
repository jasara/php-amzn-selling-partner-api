<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ListFinancialEventsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ListFinancialEventsPayloadSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
