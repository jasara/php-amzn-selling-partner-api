<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RegionSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['size:2'])]
        public ?string $country_code,
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $state,
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $warehouse_id,
    ) {
    }
}
