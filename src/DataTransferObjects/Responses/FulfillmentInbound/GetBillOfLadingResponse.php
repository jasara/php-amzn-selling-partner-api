<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\BillOfLadingDownloadURLSchema;

class GetBillOfLadingResponse extends BaseResponse
{
    public BillOfLadingDownloadURLSchema $payload;
}
