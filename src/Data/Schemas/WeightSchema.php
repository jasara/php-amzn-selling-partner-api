<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Validators\StringIsNumberValidator;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use Spatie\DataTransferObject\DataTransferObject;

class WeightSchema extends DataTransferObject
{
    #[StringIsNumberValidator]
    public string $value;

    #[StringEnumValidator(['pounds', 'kilograms', 'oz', 'g', 'lb', 'kg', 'KG', 'LB'])]
    public string $unit;

    public function asMass(): Mass
    {
        return new Mass($this->value, $this->unit);
    }
}
