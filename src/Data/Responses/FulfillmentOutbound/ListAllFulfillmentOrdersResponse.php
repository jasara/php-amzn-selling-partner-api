<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\ListAllFulfillmentOrdersResultSchema;

class ListAllFulfillmentOrdersResponse extends BaseResponse
{
    public function __construct(
        public ?ListAllFulfillmentOrdersResultSchema $payload,
    ) {
    }
}
