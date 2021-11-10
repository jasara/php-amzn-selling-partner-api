<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Tokens;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class RestrictedResourceSchema extends DataTransferObject
{
    #[StringEnumValidator(['GET', 'PUT', 'POST', 'DELETE'])]
    public string $method;

    public string $path;

    #[StringArrayEnumValidator(['buyerInfo', 'shippingAddress'])]
    public ?array $data_elements;
}
