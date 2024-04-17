<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemVendorDetailsCategorySchema extends BaseSchema
{
    public function __construct(
        public ?string $display_name,
        public ?string $value,
    ) {
    }
}
