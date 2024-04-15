<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\CreateFulfillmentReturnResultSchema;

class CreateFulfillmentReturnResponse extends BaseResponse
{
    public ?CreateFulfillmentReturnResultSchema $payload;
}
