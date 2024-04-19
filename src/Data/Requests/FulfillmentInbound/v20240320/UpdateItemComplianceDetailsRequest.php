<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\TaxDetailsSchema;

class UpdateItemComplianceDetailsRequest extends BaseRequest
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:40'])]
        public string $msku,
        public TaxDetailsSchema $tax_details,
    ) {
    }
}
