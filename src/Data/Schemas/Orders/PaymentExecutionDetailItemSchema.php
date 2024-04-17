<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class PaymentExecutionDetailItemSchema extends BaseSchema
{
    public function __construct(
        public MoneySchema $payment,
        public string $payment_method,
    ) {
    }
}
