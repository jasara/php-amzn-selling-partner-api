<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LinkSchema extends BaseSchema
{
    public function __construct(
        public string $resource,
        #[StringEnumValidator(['GET', 'POST', 'PUT', 'PATCH', 'DELETE'])]
        public string $verb,
    ) {
    }
}
