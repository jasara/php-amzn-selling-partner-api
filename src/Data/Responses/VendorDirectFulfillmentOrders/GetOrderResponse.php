<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders\OrderSchema;

class GetOrderResponse extends BaseResponse
{
    public function __construct(
        public ?OrderSchema $payload = null,
    ) {}

}
