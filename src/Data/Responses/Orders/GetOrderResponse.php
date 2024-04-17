<?php

namespace Jasara\AmznSPA\Data\Responses\Orders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Orders\OrderSchema;

class GetOrderResponse extends BaseResponse
{
    public function __construct(
        public ?OrderSchema $payload,
    ) {
    }
}
