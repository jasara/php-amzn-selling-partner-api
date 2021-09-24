<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\GetPrepInstructionsResultSchema;

class GetPrepInstructionsResponse extends BaseResponse
{
    public ?GetPrepInstructionsResultSchema $payload;
}
