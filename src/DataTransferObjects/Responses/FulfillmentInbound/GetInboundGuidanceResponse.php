<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\GetInboundGuidanceResultSchema;

class GetInboundGuidanceResponse extends BaseResponse
{
    public GetInboundGuidanceResultSchema $payload;
}
