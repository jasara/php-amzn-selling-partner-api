<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class constraintSchema extends DataTransferObject
{
    public ?string $validation_reg_ex;

    public string $validation_string;
}
