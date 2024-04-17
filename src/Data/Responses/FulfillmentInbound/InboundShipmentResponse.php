<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentResultSchema;

class InboundShipmentResponse extends BaseResponse
{
    public function __construct(
        public ?InboundShipmentResultSchema $payload,
    ) {
    }
}
