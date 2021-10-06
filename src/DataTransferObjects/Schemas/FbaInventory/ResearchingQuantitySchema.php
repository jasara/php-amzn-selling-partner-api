<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ResearchingQuantitySchema extends DataTransferObject
{
    public ?int $total_researching_quantity;

    #[CastWith(ArrayCaster::class, itemType: ResearchingQuantityEntrySchema::class)]
    public ?ResearchingQuantityEntryListSchema $researching_quantity_breakdown;
}
