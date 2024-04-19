<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\GetTransportDetailsResultSchema;

class GetTransportDetailsResponse extends BaseResponse
{
    public function __construct(
        public ?GetTransportDetailsResultSchema $payload,
    ) {
    }
}
