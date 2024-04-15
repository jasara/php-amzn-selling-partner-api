<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ItemImagesByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    #[CastWith(ArrayCaster::class, itemType: ItemImageSchema::class)]
    public ItemImageListSchema $images;
}
