<?php

namespace Jasara\AmznSPA\Data\Responses\Orders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Orders\OrderBuyerInfoSchema;

class GetOrderBuyerInfoResponse extends BaseResponse
{
    public function __construct(
        public ?OrderBuyerInfoSchema $payload,
    ) {
    }
}
