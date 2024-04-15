<?php

namespace Jasara\AmznSPA\Data\Responses\Orders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Orders\OrderItemsBuyerInfoListSchema;

class GetOrderItemsBuyerInfoResponse extends BaseResponse
{
    public ?OrderItemsBuyerInfoListSchema $payload;
}
