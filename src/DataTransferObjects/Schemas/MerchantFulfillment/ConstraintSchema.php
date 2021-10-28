<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class ConstraintSchema extends DataTransferObject
{
    public ?string $validation_reg_ex;

    public string $validation_string;
}
