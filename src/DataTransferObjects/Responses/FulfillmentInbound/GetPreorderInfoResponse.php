<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\GetPreorderInfoResultSchema;

class GetPreorderInfoResponse extends BaseResponse
{
    public ?GetPreorderInfoResultSchema $payload;
}
