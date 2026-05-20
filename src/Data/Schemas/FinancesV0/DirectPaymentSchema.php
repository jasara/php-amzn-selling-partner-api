<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DirectPaymentSchema extends BaseSchema
{
    public function __construct(
        public ?string $direct_payment_type = null,
        public ?CurrencySchema $direct_payment_amount = null,
    ) {}
}
