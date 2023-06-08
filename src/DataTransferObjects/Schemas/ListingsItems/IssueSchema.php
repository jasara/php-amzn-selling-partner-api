<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class IssueSchema extends DataTransferObject
{
    public string $code;
    public string $message;

    #[StringEnumValidator(['ERROR', 'WARNING', 'INFO'])]
    public string $severity;
    public ?array $attribute_names;
}
