<?php

namespace Jasara\AmznSPA\DTOs\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DTOs\Responses\BaseResponse;
use Jasara\AmznSPA\DTOs\Schemas\FulfillmentInbound\GetInboundGuidanceResultSchema;

class GetInboundGuidanceResponse extends BaseResponse
{
    public GetInboundGuidanceResultSchema $payload;
}
