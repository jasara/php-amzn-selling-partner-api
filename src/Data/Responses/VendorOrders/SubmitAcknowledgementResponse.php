<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorOrders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorOrders\TransactionIdSchema;

class SubmitAcknowledgementResponse extends BaseResponse
{
    public function __construct(
        public ?TransactionIdSchema $payload = null,
    ) {}

}
