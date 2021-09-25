<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\GetTransportDetailsResultSchema;

class GetTransportDetailsResponse extends BaseResponse
{
    public GetTransportDetailsResultSchema $payload;
}
