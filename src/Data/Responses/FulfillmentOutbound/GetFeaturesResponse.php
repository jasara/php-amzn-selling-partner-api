<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\GetFeaturesResponsePayloadSchema;

class GetFeaturesResponse extends BaseResponse
{
    public function __construct(
        public ?GetFeaturesResponsePayloadSchema $payload,
    ) {
    }
}
