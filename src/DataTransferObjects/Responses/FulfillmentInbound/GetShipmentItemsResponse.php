<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\GetShipmentItemsResultSchema;

class GetShipmentItemsResponse extends BaseResponse
{
    public ?GetShipmentItemsResultSchema $payload;
}
