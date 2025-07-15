<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RegulatedOrderVerificationStatusSchema extends BaseSchema
{
    public function __construct(
        public string $status,
        public string $external_reviewer_id,
        public ValidRejectionReasonsListSchema $valid_rejection_reasons,
        public ?string $rejection_reason_id = null,
    ) {
    }
}
