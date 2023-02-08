<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class RefinementsSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: BrandRefinementSchema::class)]
    /** @var Collection<int, BrandRefinementSchema> */
    public Collection $brands;

    #[CastWith(ArrayCaster::class, itemType: ClassificationRefinementSchema::class)]
    /** @var Collection<int, ClassificationRefinementSchema> */
    public ?Collection $classifications;
}
