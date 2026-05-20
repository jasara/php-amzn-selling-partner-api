<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorOrders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorOrders\OrderSchema;

class GetPurchaseOrderResponse extends BaseResponse
{
    public function __construct(
        public ?OrderSchema $payload = null,
    ) {}

}
