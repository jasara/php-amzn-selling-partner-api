<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemImageSchema extends BaseSchema
{
    public function __construct(
        public ?string $variant,
        public string $link,
        public int $height,
        public int $width,
    ) {
    }
}
