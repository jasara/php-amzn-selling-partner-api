<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

class ItemLengthDimensionSchema extends BaseSchema
{
    public function __construct(
        public ?string $unit,
        public ?float $value,
    ) {
    }

    public function asUom(): Length
    {
        return new Length($this->value, strtolower($this->unit));
    }
}
