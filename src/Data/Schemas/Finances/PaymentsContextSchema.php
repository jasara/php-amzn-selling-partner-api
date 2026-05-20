<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PaymentsContextSchema extends BaseSchema
{
    public function __construct(
        public ?string $payment_type = null,
        public ?string $payment_method = null,
        public ?string $payment_reference = null,
        public ?string $payment_date = null,
    ) {}
}
