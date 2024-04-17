<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RefinementsSchema extends BaseSchema
{
    public function __construct(
        /** @var Collection<int, BrandRefinementSchema> */
        public Collection $brands,

        /** @var Collection<int, ClassificationRefinementSchema> */
        public ?Collection $classifications,
    ) {
    }
}
