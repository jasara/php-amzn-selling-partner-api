<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Base\Validators\StringIsNumberValidator;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

class WeightSchema extends BaseSchema
{
    public function __construct(
        #[StringIsNumberValidator]
        public string $value,
        #[StringEnumValidator(['pounds', 'kilograms', 'oz', 'g', 'lb', 'kg', 'KG', 'LB'])]
        public string $unit,
    ) {
    }

    public function asMass(): Mass
    {
        if($this->unit === 'KG') {
            $this->unit = 'kg';
        }

        if($this->unit === 'LB') {
            $this->unit = 'lb';
        }

        return new Mass($this->value, $this->unit);
    }
}
