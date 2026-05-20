<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PaymentSchema extends BaseSchema
{
    public function __construct(
        public ?MoneyAmountSchema $amount = null,
        public ?string $instrument = null,
    ) {}
}
