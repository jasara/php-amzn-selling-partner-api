<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ComplianceDetailSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:10'])]
        public ?string $asin,
        #[RuleValidator(['min:1', 'max:10'])]
        public ?string $fnsku,
        #[RuleValidator(['min:1', 'max:40'])]
        public ?string $msku,
        public ?TaxDetailsSchema $tax_details,
    ) {
    }
}
