<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemDimensionsSchema extends BaseSchema
{
    public function __construct(
        public ?ItemLengthDimensionSchema $height,
        public ?ItemLengthDimensionSchema $length,
        public ?ItemLengthDimensionSchema $width,
        public ?ItemMassDimensionSchema $weight,
    ) {
    }
}
