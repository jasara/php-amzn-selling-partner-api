<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\CommonTransportResultSchema;

class PutTransportDetailsResponse extends BaseResponse
{
    public ?CommonTransportResultSchema $payload;
}
