<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\GetShipmentsResultSchema;

class GetShipmentsResponse extends BaseResponse
{
    public ?GetShipmentsResultSchema $payload;
}
