<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\ListReturnReasonCodesResultSchema;

class ListReturnReasonCodesResponse extends BaseResponse
{
    public function __construct(
        public ?ListReturnReasonCodesResultSchema $payload,
    ) {
    }
}
