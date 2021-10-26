<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringIsNumberValidator;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use Spatie\DataTransferObject\DataTransferObject;

class WeightSchema extends DataTransferObject
{
    #[StringIsNumberValidator]
    public string $value;

    #[StringEnumValidator(['pounds', 'kilograms', 'oz', 'g'])]
    public string $unit;

    public function asMass(): Mass
    {
        return new Mass($this->value, $this->unit);
    }
}
