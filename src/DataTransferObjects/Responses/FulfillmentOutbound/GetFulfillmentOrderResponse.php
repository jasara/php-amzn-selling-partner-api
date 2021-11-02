<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;

class GetFulfillmentOrderResponse extends BaseResponse
{
    public ?GetFulfillmentOrderResultSchema $payload;
}
