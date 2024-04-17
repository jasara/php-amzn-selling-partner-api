<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AttributePropertySchema extends BaseSchema
{
    public function __construct(
        public string $name,
        public ?string $value,

        public ?Collection $properties,
    ) {
    }
}
