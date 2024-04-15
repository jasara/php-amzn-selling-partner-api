<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class ConstraintSchema extends DataTransferObject
{
    public ?string $validation_reg_ex;

    public string $validation_string;
}
