<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\BillOfLadingDownloadURLSchema;

class GetBillOfLadingResponse extends BaseResponse
{
    public ?BillOfLadingDownloadURLSchema $payload;
}
