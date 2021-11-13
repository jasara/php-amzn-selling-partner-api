<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\GetFulfillmentOrderResultSchema;

class GetFulfillmentOrderResponse extends BaseResponse
{
    public ?GetFulfillmentOrderResultSchema $payload;
}
