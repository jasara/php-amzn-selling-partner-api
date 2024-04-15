<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LinkSchema extends DataTransferObject
{
    public string $resource;

    #[StringEnumValidator(['GET', 'POST', 'PUT', 'PATCH', 'DELETE'])]
    public string $verb;
}
