<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\GetShipmentItemsResultSchema;

class GetShipmentItemsResponse extends BaseResponse
{
    public function __construct(
        public ?GetShipmentItemsResultSchema $payload,
    ) {
    }
}
