<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PlacementOptionSummarySchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['size:38'])]
        public string $placement_option_id,
        public PlacementOptionStatus $status,
    ) {
    }
}
