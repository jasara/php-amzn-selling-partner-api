<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401;

use Jasara\AmznSPA\Data\Schemas\CatalogItems;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ItemSalesRanksByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    #[CastWith(ArrayCaster::class, itemType: CatalogItems\ItemClassificationSalesRankSchema::class)]
    public ?CatalogItems\ItemClassificationSalesRankListSchema $classification_ranks;

    #[CastWith(ArrayCaster::class, itemType: CatalogItems\ItemDisplayGroupSalesRankSchema::class)]
    public ?CatalogItems\ItemDisplayGroupSalesRankListSchema $display_group_ranks;
}
