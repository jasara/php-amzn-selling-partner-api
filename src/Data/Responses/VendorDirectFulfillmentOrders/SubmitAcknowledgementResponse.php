<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders\TransactionIdSchema;

class SubmitAcknowledgementResponse extends BaseResponse
{
    public function __construct(
        public ?TransactionIdSchema $payload = null,
    ) {}

}
