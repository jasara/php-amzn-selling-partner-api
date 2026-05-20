<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Transfers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetPaymentMethodsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?PaymentMethodListSchema $payment_methods = null,
    ) {}
}
