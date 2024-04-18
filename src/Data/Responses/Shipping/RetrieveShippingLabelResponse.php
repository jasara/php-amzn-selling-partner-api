<?php

namespace Jasara\AmznSPA\Data\Responses\Shipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Shipping\RetrieveShippingLabelResultSchema;

class RetrieveShippingLabelResponse extends BaseResponse
{
    public function __construct(
        public ?RetrieveShippingLabelResultSchema $payload,
    ) {
    }
}
