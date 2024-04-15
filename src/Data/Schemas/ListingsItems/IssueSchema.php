<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class IssueSchema extends DataTransferObject
{
    public string $code;
    public string $message;

    #[StringEnumValidator(['ERROR', 'WARNING', 'INFO'])]
    public string $severity;
    public ?array $attribute_names;
}
