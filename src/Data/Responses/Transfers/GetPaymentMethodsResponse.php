<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Transfers;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Transfers\PaymentMethodListSchema;

class GetPaymentMethodsResponse extends BaseResponse
{
    public function __construct(
        public ?PaymentMethodListSchema $payment_methods = null,
    ) {}

}
