<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\ListReturnReasonCodesResultSchema;

class ListReturnReasonCodesResponse extends BaseResponse
{
    public ?ListReturnReasonCodesResultSchema $payload;
}
