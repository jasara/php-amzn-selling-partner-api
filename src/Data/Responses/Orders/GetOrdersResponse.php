<?php

namespace Jasara\AmznSPA\Data\Responses\Orders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Orders\OrdersListSchema;

class GetOrdersResponse extends BaseResponse
{
    public function __construct(
        public ?OrdersListSchema $payload,
    ) {
    }
}
