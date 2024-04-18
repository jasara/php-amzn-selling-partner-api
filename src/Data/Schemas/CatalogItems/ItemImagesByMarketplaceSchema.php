<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemImagesByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,

        public ItemImageListSchema $images,
    ) {
    }
}
