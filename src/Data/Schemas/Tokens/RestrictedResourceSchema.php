<?php

namespace Jasara\AmznSPA\Data\Schemas\Tokens;

use Jasara\AmznSPA\Data\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class RestrictedResourceSchema extends DataTransferObject
{
    #[StringEnumValidator(['GET', 'PUT', 'POST', 'DELETE'])]
    public string $method;

    public string $path;

    #[StringArrayEnumValidator(['buyerInfo', 'shippingAddress'])]
    public ?array $data_elements;
}
