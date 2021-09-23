<?php

namespace Jasara\AmznSPA\DTOs\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\DTOs\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class InvalidSKUSchema extends DataTransferObject
{
    public ?string $seller_sku;

    #[StringEnumValidator(['DoesNotExist', 'InvalidASIN'])]
    public string $error_reason;
}
