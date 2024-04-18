<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ClassificationRefinementSchema extends BaseSchema
{
    public function __construct(
        public int $number_of_results,
        public string $display_name,
        public string $classification_id,
    ) {
    }
}
