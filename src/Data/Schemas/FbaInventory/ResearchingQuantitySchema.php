<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ResearchingQuantitySchema extends BaseSchema
{
    public function __construct(
        public ?int $total_researching_quantity,

        public ?ResearchingQuantityEntryListSchema $researching_quantity_breakdown,
    ) {
    }
}
