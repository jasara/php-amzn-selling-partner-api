<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemProductTypeByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public ?string $marketplace_id,
        public ?string $product_type,
    ) {
    }
}
