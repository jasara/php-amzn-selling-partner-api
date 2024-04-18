<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\GetFulfillmentPreviewResultSchema;

class GetFulfillmentPreviewResponse extends BaseResponse
{
    public function __construct(
        public ?GetFulfillmentPreviewResultSchema $payload,
    ) {
    }
}
