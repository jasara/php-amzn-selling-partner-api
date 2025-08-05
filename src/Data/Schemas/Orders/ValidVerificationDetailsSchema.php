<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ValidVerificationDetailsSchema extends BaseSchema
{
    /** @param string[] $valid_verification_statuses */
    public function __construct(
        public string $verification_detail_type,
        public array $valid_verification_statuses,
    ){
    }
}
