<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\LabelDownloadURLSchema;

class GetLabelsResponse extends BaseResponse
{
    public ?LabelDownloadURLSchema $payload;
}
