<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Orders;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Orders\OrderBuyerInfoSchema;

class GetOrderBuyerInfoResponse extends BaseResponse
{
    public ?OrderBuyerInfoSchema $payload;
}
