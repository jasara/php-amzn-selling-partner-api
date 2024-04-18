<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BrandRefinementSchema extends BaseSchema
{
    public function __construct(
        public int $number_of_results,
        public string $brand_name,
    ) {
    }
}
