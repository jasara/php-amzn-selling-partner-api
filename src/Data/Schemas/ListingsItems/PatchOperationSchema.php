<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PatchOperationSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['add', 'replace', 'delete'])]
        public string $op,
        public string $path,
        public ?array $value,
    ) {
    }
}
