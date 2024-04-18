<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AttributePropertySchema extends BaseSchema
{
    public function __construct(
        public string $name,
        public ?string $value,
        public ?AttributePropertyListSchema $properties,
    ) {
    }
}
