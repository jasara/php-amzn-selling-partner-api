<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\GetFeatureInventoryResultSchema;

class GetFeatureInventoryResponse extends BaseResponse
{
    public function __construct(
        public ?GetFeatureInventoryResultSchema $payload,
    ) {
    }
}
