<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class InvalidSKUSchema extends DataTransferObject
{
    public ?string $seller_sku;

    #[StringEnumValidator(['DoesNotExist', 'InvalidASIN'])]
    public ?string $error_reason;
}
