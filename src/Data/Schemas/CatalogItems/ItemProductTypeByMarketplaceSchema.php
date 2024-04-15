<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemProductTypeByMarketplaceSchema extends DataTransferObject
{
    public ?string $marketplace_id;

    public ?string $product_type;
}
