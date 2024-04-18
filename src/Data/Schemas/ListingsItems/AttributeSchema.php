<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AttributeSchema extends BaseSchema
{
    public function __construct(
        public string $name,
        public AttributePropertyListSchema $properties,
    ) {
    }
}
