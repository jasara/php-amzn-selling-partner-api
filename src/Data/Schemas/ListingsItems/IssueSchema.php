<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class IssueSchema extends BaseSchema
{
    public function __construct(
        public string $code,
        public string $message,
        #[StringEnumValidator(['ERROR', 'WARNING', 'INFO'])]
        public string $severity,
        public ?array $attribute_names,
    ) {
    }
}
