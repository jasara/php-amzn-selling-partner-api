<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\BillOfLadingDownloadUrlSchema;

class GetBillOfLadingResponse extends BaseResponse
{
    public function __construct(
        public ?BillOfLadingDownloadUrlSchema $payload,
    ) {
    }
}
