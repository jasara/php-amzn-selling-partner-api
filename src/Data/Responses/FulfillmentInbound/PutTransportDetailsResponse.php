<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\CommonTransportResultSchema;

class PutTransportDetailsResponse extends BaseResponse
{
    public function __construct(
        public ?CommonTransportResultSchema $payload,
    ) {
    }
}
