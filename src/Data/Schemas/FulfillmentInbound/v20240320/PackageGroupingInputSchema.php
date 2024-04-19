<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PackageGroupingInputSchema extends BaseSchema
{
    public function __construct(
        public BoxInputListSchema $boxes,
        #[RuleValidator(['size:38'])]
        public ?string $packing_group_id,
        #[RuleValidator(['size:38'])]
        public ?string $shipment_id,
    ) {
    }
}
