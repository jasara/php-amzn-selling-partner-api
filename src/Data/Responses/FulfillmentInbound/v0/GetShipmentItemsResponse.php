<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\GetShipmentItemsResultSchema;

class GetShipmentItemsResponse extends BaseResponse
{
    public function __construct(
        public ?GetShipmentItemsResultSchema $payload,
    ) {
    }
}
