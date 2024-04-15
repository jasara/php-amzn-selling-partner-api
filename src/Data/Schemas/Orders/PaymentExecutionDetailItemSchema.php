<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class PaymentExecutionDetailItemSchema extends DataTransferObject
{
    public MoneySchema $payment;

    public string $payment_method;
}
