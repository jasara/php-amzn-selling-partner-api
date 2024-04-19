<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ComplianceDetailListSchema;

class ListItemComplianceDetailsResponse extends BaseResponse
{
    public function __construct(
        public ?ComplianceDetailListSchema $compliance_details,
    ) {
    }
}
