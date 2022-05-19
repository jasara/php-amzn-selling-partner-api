<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use Spatie\DataTransferObject\DataTransferObject;

class ItemMassDimensionSchema extends DataTransferObject
{
    public ?string $unit;

    public ?float $value;

    public function asUom(): Mass
    {
        return new Mass($this->value, strtolower($this->unit));
    }
}
