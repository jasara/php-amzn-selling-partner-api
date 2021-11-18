<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\GetFulfillmentPreviewResultSchema;

class GetFulfillmentPreviewResponse extends BaseResponse
{
    public ?GetFulfillmentPreviewResultSchema $payload;
}
