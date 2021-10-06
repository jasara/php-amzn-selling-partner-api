<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetInventorySummariesResultSchema extends DataTransferObject
{
    public GranularitySchema $granularity;

    #[CastWith(ArrayCaster::class, itemType: InventorySummarySchema::class)]
    public InventorySummariesListSchema $inventory_summaries;
}
