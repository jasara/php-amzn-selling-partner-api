<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\ListAllFulfillmentOrdersResultSchema;

class ListAllFulfillmentOrdersResponse extends BaseResponse
{
    public ?ListAllFulfillmentOrdersResultSchema $payload;
}
