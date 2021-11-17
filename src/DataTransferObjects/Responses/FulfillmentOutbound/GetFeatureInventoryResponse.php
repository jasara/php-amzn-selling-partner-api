<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\GetFeatureInventoryResultSchema;

class GetFeatureInventoryResponse extends BaseResponse
{
    public ?GetFeatureInventoryResultSchema $payload;
}
