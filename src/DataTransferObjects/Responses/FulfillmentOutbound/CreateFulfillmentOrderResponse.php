<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorListSchema;

class CreateFulfillmentOrderResponse extends BaseResponse
{
    public ?ErrorListSchema $payload;
}
