<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AttributeSchema extends BaseSchema
{
    public function __construct(
        public string $name,

        public Collection $properties,
    ) {
    }
}
