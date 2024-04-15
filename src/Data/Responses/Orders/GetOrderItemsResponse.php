<?php

namespace Jasara\AmznSPA\Data\Responses\Orders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Orders\OrderItemsListSchema;

class GetOrderItemsResponse extends BaseResponse
{
    public ?OrderItemsListSchema $payload;
}
