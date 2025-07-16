<?php

namespace Jasara\AmznSPA\Data\Responses\Orders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Orders\RegulatedOrderSchema;

class GetOrderRegulatedInfoResponse extends BaseResponse
{
    public function __construct(
        public ?RegulatedOrderSchema $payload,
    ) {
    }
}
