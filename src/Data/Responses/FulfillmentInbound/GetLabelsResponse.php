<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\LabelDownloadUrlSchema;

class GetLabelsResponse extends BaseResponse
{
    public function __construct(
        public ?LabelDownloadUrlSchema $payload,
    ) {
    }
}
