<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use Spatie\DataTransferObject\DataTransferObject;

class ItemLengthDimensionSchema extends DataTransferObject
{
    public ?string $unit;

    public ?float $value;

    public function asUom(): Length
    {
        return new Length($this->value, strtolower($this->unit));
    }
}
