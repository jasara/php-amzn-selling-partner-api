<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Responses\BaseResponse;

class CreateInboundPlanResponse extends BaseResponse
{
    public function __construct(
        #[RuleValidator(['size:38'])]
        public ?string $inbound_plan_id,
        #[RuleValidator(['min:36', 'max:38'])]
        public ?string $operation_id,
    ) {
    }
}
