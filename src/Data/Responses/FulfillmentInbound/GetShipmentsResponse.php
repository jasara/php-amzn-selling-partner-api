<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\GetShipmentsResultSchema;

class GetShipmentsResponse extends BaseResponse
{
    public function __construct(
        public ?GetShipmentsResultSchema $payload,
    ) {
    }
}
