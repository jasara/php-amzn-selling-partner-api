<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

class ItemMassDimensionSchema extends BaseSchema
{
    public function __construct(
        public ?string $unit,
        public ?float $value,
    ) {
    }

    public function asUom(): Mass
    {
        return new Mass($this->value, strtolower($this->unit));
    }
}
