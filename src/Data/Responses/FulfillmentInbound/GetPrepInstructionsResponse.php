<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\GetPrepInstructionsResultSchema;

class GetPrepInstructionsResponse extends BaseResponse
{
    public ?GetPrepInstructionsResultSchema $payload;
}
