<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class PaymentExecutionDetailItemSchema extends DataTransferObject
{
    public MoneySchema $payment;

    public string $payment_method;
}
