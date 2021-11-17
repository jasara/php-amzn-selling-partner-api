<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\GetFeatureSkuResultSchema;

class GetFeatureSkuResponse extends BaseResponse
{
    public ?GetFeatureSkuResultSchema $payload;
}
