<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class InvalidASINSchema extends DataTransferObject
{
    public ?string $asin;

    #[StringEnumValidator(['DoesNotExist', 'InvalidASIN'])]
    public ?string $error_reason;
}
