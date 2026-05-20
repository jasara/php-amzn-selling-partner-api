<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BreakdownSchema extends BaseSchema
{
    public function __construct(
        public ?string $breakdown_type = null,
        public ?CurrencySchema $breakdown_amount = null,
        public ?array $breakdowns = null,
    ) {}
}
