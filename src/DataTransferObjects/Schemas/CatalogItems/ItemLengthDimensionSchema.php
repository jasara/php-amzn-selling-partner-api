<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use Spatie\DataTransferObject\DataTransferObject;

class ItemLengthDimensionSchema extends DataTransferObject
{
    public ?string $unit;

    public ?float $number;

    public function asUom(): Length
    {
        return new Length($this->number, strtolower($this->unit));
    }
}
