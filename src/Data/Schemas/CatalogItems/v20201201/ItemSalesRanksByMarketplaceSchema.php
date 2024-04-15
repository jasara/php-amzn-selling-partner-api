<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201;

use Jasara\AmznSPA\Data\Schemas\CatalogItems;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ItemSalesRanksByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    #[CastWith(ArrayCaster::class, itemType: CatalogItems\ItemSalesRankSchema::class)]
    public CatalogItems\ItemSalesRankListSchema $ranks;
}
