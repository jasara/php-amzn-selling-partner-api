<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\GetTransportDetailsResultSchema;

class GetTransportDetailsResponse extends BaseResponse
{
    public ?GetTransportDetailsResultSchema $payload;
}
