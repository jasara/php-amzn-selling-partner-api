<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class AttributePropertySchema extends DataTransferObject
{
    public string $name; // value, type, marketplace_id, etc
    public ?string $value;

    /** @var Collection<int, AttributePropertySchema> */
    #[CastWith(ArrayCaster::class, itemType: AttributePropertySchema::class)]
    public ?Collection $properties;
}
