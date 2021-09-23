<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class InvalidSKUSchema extends DataTransferObject
{
    public ?string $seller_sku;

    #[StringEnumValidator(['DoesNotExist', 'InvalidASIN'])]
    public string $error_reason;
}
