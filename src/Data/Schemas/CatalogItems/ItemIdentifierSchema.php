<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemIdentifierSchema extends BaseSchema
{
    public function __construct(
        public string $identifier_type,
        public string $identifier,
    ) {
    }
}
