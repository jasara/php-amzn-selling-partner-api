<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\GetFeatureSkuResultSchema;

class GetFeatureSkuResponse extends BaseResponse
{
    public function __construct(
        public ?GetFeatureSkuResultSchema $payload,
    ) {
    }
}
