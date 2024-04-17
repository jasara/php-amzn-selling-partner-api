<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\GetPreorderInfoResultSchema;

class GetPreorderInfoResponse extends BaseResponse
{
    public function __construct(
        public ?GetPreorderInfoResultSchema $payload,
    ) {
    }
}
