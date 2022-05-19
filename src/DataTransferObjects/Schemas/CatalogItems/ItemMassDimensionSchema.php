<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use Spatie\DataTransferObject\DataTransferObject;

class ItemMassDimensionSchema extends DataTransferObject
{
    public ?string $unit;

    public ?float $number;

    public function asUom(): Mass
    {
        return new Mass($this->number, strtolower($this->unit));
    }
}
