<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ItemRelationshipsByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    #[CastWith(ArrayCaster::class, itemType: ItemRelationshipSchema::class)]
    public ?ItemRelationshipListSchema $relationships;
}
