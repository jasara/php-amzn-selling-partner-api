<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemIdentifiersByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,

        public ItemIdentifierListSchema $identifiers,
    ) {
    }
}
