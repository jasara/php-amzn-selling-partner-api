<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\CreateFulfillmentReturnResultSchema;

class CreateFulfillmentReturnResponse extends BaseResponse
{
    public ?CreateFulfillmentReturnResultSchema $payload;
}
