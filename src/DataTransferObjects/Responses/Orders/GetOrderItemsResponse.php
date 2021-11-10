<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Orders;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Orders\OrderItemsListSchema;

class GetOrderItemsResponse extends BaseResponse
{
    public ?OrderItemsListSchema $payload;
}
