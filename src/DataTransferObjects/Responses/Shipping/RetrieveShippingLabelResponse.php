<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\RetrieveShippingLabelResultSchema;

class RetrieveShippingLabelResponse extends BaseResponse
{
    public ?RetrieveShippingLabelResultSchema $payload;
}
