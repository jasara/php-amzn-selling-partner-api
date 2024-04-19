<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\GetShipmentsResultSchema;

class GetShipmentsResponse extends BaseResponse
{
    public function __construct(
        public ?GetShipmentsResultSchema $payload,
    ) {
    }
}
