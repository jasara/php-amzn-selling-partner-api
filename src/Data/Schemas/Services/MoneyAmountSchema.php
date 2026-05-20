<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MoneyAmountSchema extends BaseSchema
{
    public function __construct(
        public ?float $value = null,
        public ?string $currency = null,
    ) {}
}
