<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class AttributeSchema extends DataTransferObject
{
    public string $name; // bullet_point, brand, manufacturer, etc

    /**
     * @var Collection<int, AttributePropertySchema>
     */
    #[CastWith(ArrayCaster::class, itemType: AttributePropertySchema::class)]
    public Collection $properties;
}
