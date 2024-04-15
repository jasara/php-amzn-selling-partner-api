<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class PatchOperationSchema extends DataTransferObject
{
    #[StringEnumValidator(['add', 'replace', 'delete'])]
    public string $op;

    public string $path;

    public ?array $value;
}
