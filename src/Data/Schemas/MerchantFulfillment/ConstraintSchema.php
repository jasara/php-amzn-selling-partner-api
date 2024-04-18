<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ConstraintSchema extends BaseSchema
{
    public function __construct(
        public ?string $validation_reg_ex,
        public string $validation_string,
    ) {
    }
}
