<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductTypeDefinitions;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LinkSchema extends DataTransferObject
{
    public string $resource;

    #[StringEnumValidator(['GET', 'POST', 'PUT', 'PATCH', 'DELETE'])]
    public string $verb;
}
