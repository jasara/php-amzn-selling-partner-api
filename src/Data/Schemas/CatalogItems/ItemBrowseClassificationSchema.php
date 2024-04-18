<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemBrowseClassificationSchema extends BaseSchema
{
    public function __construct(
        public string $display_name,
        public string $classification_id,
    ) {
    }
}
