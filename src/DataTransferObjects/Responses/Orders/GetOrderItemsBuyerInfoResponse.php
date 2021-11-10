<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Orders;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Orders\OrderItemsBuyerInfoListSchema;

class GetOrderItemsBuyerInfoResponse extends BaseResponse
{
    public ?OrderItemsBuyerInfoListSchema $payload;
}
