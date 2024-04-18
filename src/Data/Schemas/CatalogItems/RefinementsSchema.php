<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RefinementsSchema extends BaseSchema
{
    public function __construct(
        public BrandRefinementListSchema $brands,
        public ?ClassificationRefinementListSchema $classifications,
    ) {
    }
}
