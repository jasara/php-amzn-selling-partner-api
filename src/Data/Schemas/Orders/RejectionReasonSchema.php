<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RejectionReasonSchema extends BaseSchema
{
    public function __construct(
        public string $rejection_reason_id,
        public string $rejection_reason_description,
    ) {
    }
}
