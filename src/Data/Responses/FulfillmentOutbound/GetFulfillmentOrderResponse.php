<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\GetFulfillmentOrderResultSchema;

class GetFulfillmentOrderResponse extends BaseResponse
{
    public function __construct(
        public ?GetFulfillmentOrderResultSchema $payload,
    ) {
    }
}
