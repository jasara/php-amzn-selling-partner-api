<?php

namespace Jasara\AmznSPA\Data\Responses\FbaInboundEligibility;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FbaInboundEligibility\ItemEligibilityPreviewSchema;

class GetItemEligibilityPreviewResponse extends BaseResponse
{
    public function __construct(
        public ?ItemEligibilityPreviewSchema $payload,
    ) {
    }
}
