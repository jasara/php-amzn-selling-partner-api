<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemDimensionsByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    public ?ItemDimensionsSchema $item;

    public ?ItemDimensionsSchema $package;
}
