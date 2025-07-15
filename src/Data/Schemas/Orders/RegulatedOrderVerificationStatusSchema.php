<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RegulatedOrderVerificationStatusSchema extends BaseSchema
{
    public function __construct(
        public string $Status,
        public bool $RequiresMerchantAction,
        public ValidRejectionReasonsListSchema $valid_rejection_reasons,
    ) {
    }
}
