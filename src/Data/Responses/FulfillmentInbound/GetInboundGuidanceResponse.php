<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\GetInboundGuidanceResultSchema;

class GetInboundGuidanceResponse extends BaseResponse
{
    public ?GetInboundGuidanceResultSchema $payload;
}
