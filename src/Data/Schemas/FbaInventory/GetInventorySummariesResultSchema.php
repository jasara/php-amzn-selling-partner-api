<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetInventorySummariesResultSchema extends BaseSchema
{
    public function __construct(
        public GranularitySchema $granularity,

        public InventorySummariesListSchema $inventory_summaries,
    ) {
    }
}
