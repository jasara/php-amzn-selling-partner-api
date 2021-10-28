<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FbaInboundEligibility;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInboundEligibility\ItemEligibilityPreviewSchema;

class GetItemEligibilityPreviewResponse extends BaseResponse
{
    public ?ItemEligibilityPreviewSchema $payload;
}
