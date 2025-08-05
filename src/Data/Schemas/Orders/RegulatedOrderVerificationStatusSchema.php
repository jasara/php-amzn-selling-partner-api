<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RegulatedOrderVerificationStatusSchema extends BaseSchema
{
    public function __construct(
        public string $status,
        public bool $requires_merchant_action,
        public RejectionReasonSchema $rejection_reason,
        public ValidRejectionReasonsListSchema $valid_rejection_reasons,
        public ?string $review_date,
        public ?string $external_reviewer_id,
        public ?ValidVerificationDetailsListSchema $valid_verification_details,
    ) {
    }
}
