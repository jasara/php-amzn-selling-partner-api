<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class PatchOperationSchema extends DataTransferObject
{
    #[StringEnumValidator(['add', 'replace', 'delete'])]
    public string $op;

    public string $path;

    public ?array $value; //array of objects
}
